<?php
/**
 * The error handler for Marjoram.
 *
 * @license    Modified BSD License (see LICENSE file)
 * @version    Release: 
 * @link       
 */
 
 class logger extends module {
 
    public static function init(){
    
        define('LOGGER_ERROR',1);
        define('LOGGER_WARNING',2);
        define('LOGGER_NORMAL',4);
        
        self::get_messages();
        
        return true;
    }
    public static function install() {
    }
    
    private static function log($type, $message) {
    
    }
    
    public static function normal($message) {
    
    }
    
    public static function warning($message) {
    
    }
    
    public static function error($message) {
    
    }
    
    public static function get_messages($format='array',$level=null){
        $level = LOGGER_ERROR|LOGGER_WARNING|LOGGER_NORMAL;
        
    }
 }
 
 ?>
 