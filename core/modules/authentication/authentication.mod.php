<?php
/**
 * The base class for all Marjor.am modules.
 *
 * @license    Modified BSD License (see LICENSE file)
 * @version    Release: 
 * @link       
 */


class Authentication extends module{

    public static function install() {
        return true;
    }
    

    public static function init() {
        return true;
    }
    

    public static function bootstrap() {
        return true;
    }
    
    public static function close() {
        return true;
    }
    
    public static function create_session() {
    return true;
    }
}
?>
