<?php
/**
 * Responsible for executing the main Marjoram state loop
 *
 * @license    Modified BSD License (see LICENSE file)
 *
 */
 //error reporting.
 ini_set('display_errors','On');
 error_reporting(E_ALL | E_STRICT);
 
 define('CORE_DIR','./core');
 define('MOD_DIR',CORE_DIR.'/modules');
 define('CLASS_DIR',CORE_DIR.'/classes');
 require_once(CORE_DIR.'/config.php');
 /*
 if($handle = opendir(MOD_DIR)){
    while(($filename = readdir($handle)) !== false){
        if($filename != '.' 
           && $filename != '..' 
           && is_dir(MOD_DIR."/$filename") 
           && file_exists(MOD_DIR."/$filename/$filename.mod.php")){
            require_once(MOD_DIR."/$filename/$filename.mod.php");
        }
    }
 }
 */
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
 
 //init modules
 Logger::init();
 Database::init();
 Localization::init();
 Network::init();
 Security::init();
 Authentication::init();
 Routing::init();
 
 ?>
