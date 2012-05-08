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
    define('ABSOLUTE_DIR',getcwd());

    require_once(CORE_DIR.'/config.php');
    
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
?>