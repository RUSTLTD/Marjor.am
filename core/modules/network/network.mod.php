<?php
/**
 * The network communication core modules.
 *
 * @license    Modified BSD License (see LICENSE file)
 * @version    Release: 
 * @link       
 */


class Network extends module{

    public static $type;
    public static $input;
    public static $output = array();
    public static $sid;
    
    public static function install() {
        return true;
    }
    

    public static function init() {
        //parse incoming request
        self::$type = $_POST['type'];
        if(self::$type == 'auth' ) {
            //passing the encrypted section to security 
            //and converting the result from json to associative array
            self::$input = json_decode(Security::decrypt_rsa($_POST),true);
            self::$sid = Authentication::create_session();
        } else {
            if(isset($_POST['sid'])) {
                
            } else {
                Logger::error('NETWORK_MISSINGUID', 'Non-authentication request requires uid.');
            }
        }
        return true;
    }
    

    public static function bootstrap() {
        return true;
    }
    

    public static function close() {
        //send conformation or return data
        return true;
    }
}
?>
