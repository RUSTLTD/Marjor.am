<?php
/**
 * Responsible for initial install wizard for Marjoram
 *
 * @license    Modified BSD License (see LICENSE file)
 *
 */
    ini_set('display_errors','On');
    error_reporting(E_ALL | E_STRICT);

    define('CORE_DIR','./core');
    define('MOD_DIR',CORE_DIR.'/modules');
    define('CLASS_DIR',CORE_DIR.'/classes');
    define('THEME_DIR',CORE_DIR.'/themes');
    define('ABSOLUTE_DIR',getcwd());

    require_once(CORE_DIR.'/config.php');
    
    //installer constants
    define('STATE','install');
    
    //classes first
    require_once(CLASS_DIR."/module.php");

    //then modules
    require_once(MOD_DIR."/logger/logger.mod.php");
    require_once(MOD_DIR."/database/database.mod.php");
    require_once(MOD_DIR."/localization/localization.mod.php");
    require_once(MOD_DIR."/network/network.mod.php");
    require_once(MOD_DIR."/security/security.mod.php");
    require_once(MOD_DIR."/authentication/authentication.mod.php");
    require_once(MOD_DIR."/routing/routing.mod.php");
    
    
/*
    We're going to use the Oregano base theme, regardless of what 'front' theme may be chosen;
    This way we can ensure that everything looks the way it was intended, and no weird
    glitches occur.
*/

    //grab installer array
    $install_array = isset($_POST['install'])?unserialize(urldecode($_POST['install'])):install_get_default_install_array();
    
    $current_function = 'install_'.$install_array['state'];
    
    install_print_state($current_function($install_array));
    
    //LET LOOSE THE FUNCTIONS!
    function install_get_default_install_array(){
        return array(
            'state' => 'db_init'
        );
    }
    
    function install_db_init($state_array){
        //First determine if we already have a database set up:
        $db_set_up = defined('DATABASE_CONNECTIONS') && DATABASE_CONNECTIONS && is_array($DB_array = unserialize(DATABASE_CONNECTIONS)) && isset($DB_array['core']);
        if($db_set_up){
            $database = unserialize(DATABASE_CONNECTIONS);
        }
        
        //Build list of DBOs
        $DBOs = array();
         if($handle = opendir(MOD_DIR.'/database/DBO')){
            while(($filename = readdir($handle)) !== false){
                if($filename != '.' 
                   && $filename != '..' 
                   && $filename != 'base.php'
                   && strpos($filename,'.php') !== false){
                    $dbo = str_replace('.php','',$filename);
                    $DBOs[$dbo] = $dbo;
                }
            }
         }
        
        //Basically, we just want to ask the user for the DB config stuff here.
        return array(
            'title'=>'Database Configuration',
            'description'=>($db_set_up?
                                'Howdy! It appears that you already have your database configured. If the following values are correct, simply click "next." Else, alter the values to match your current database setup, and then click "next."':
                                'Hey there - welcome to Marjor.am! Before we can begin the installation process, we will need to configure your database connection. If you do not have a database set up presently, please view <a href="http://marjor.am/docs/">the documentation</a> for help. Once you are all set, click "next" to continue.'),
            'body' => array(
                            array('type',(isset($database)?$database['core']['type']:''),array('type'=>'select','options'=>$DBO_options))
                      ),
        );
    }
    
    function install_print_state($output){
        echo install_header();
        echo '
            <header class="clearfix">
                <h1>',$output['title'],'</h1>
            </header>
            <div id="main" role="main">
                <div class="info">',$output['description'],'</div>
                <form id="install_form" action="install.php" method="post">
                    <fieldset form_id="install_form">
                        <legend>',$output['title'],'</legend>';
        print_r($output['body']);            
                    
        echo '      </fieldset>
                </form>
            </div>';
        echo install_footer();
    }
    
    function install_header(){
        return 
        '<!doctype html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <link rel="stylesheet" href="'.THEME_DIR.'/oregano/css/oregano.css">
            <title>Marjor.am : Install</title>
            <meta name="viewport" content="width=device-width">
        </head>
        <body>';

    }
    
    function install_footer(){
        return
        '<footer>
        FOOTER FOOTER FOOTER
        </footer>
        </body>
        </html>';
    }
?>