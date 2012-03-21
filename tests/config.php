<?php
    if(!defined('BASE_DIR')){
        define('BASE_DIR','..');
    }
    define('CORE_DIR',BASE_DIR.'/core');
    define('TEST_DIR',BASE_DIR.'/tests');
    define('SIMPLETEST_DIR',BASE_DIR.'/simpletest');
    define('MOD_DIR',CORE_DIR.'/modules');
    define('CLASS_DIR',CORE_DIR.'/classes');
    define('ABSOLUTE_DIR',getcwd());
    
    //include SimpleTest classes
    require_once(SIMPLETEST_DIR."/autorun.php");
    require_once(SIMPLETEST_DIR.'/unit_tester.php');
    require_once(SIMPLETEST_DIR.'/reporter.php');
    
    //include Marjor.am classes
    require_once(CLASS_DIR."/module.php");
    
    //include Marjor.am modules
    require_once(MOD_DIR."/logger/logger.mod.php");
    require_once(MOD_DIR."/database/database.mod.php");
    require_once(MOD_DIR."/localization/localization.mod.php");
    require_once(MOD_DIR."/network/network.mod.php");
    require_once(MOD_DIR."/security/security.mod.php");
    require_once(MOD_DIR."/authentication/authentication.mod.php");
    require_once(MOD_DIR."/routing/routing.mod.php");
?>