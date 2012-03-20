<?php
/**
 * The core security modules.
 *
 * @license    Modified BSD License (see LICENSE file)
 * @version    Release: 
 * @link       
 */


class Security extends module{
    
    private static $rsa_key;
    
    public static function install() {
        /* @TODO
		 * Set up Database
		 * Prompt for entropy
		 * Generate RSA Key
		 * Populate Database
		 */	
        return true;
    }
    

    public static function init() {
        $res = Database::find(array(
                                'fields' => 'value',
                                'from' => 'system',
                                'where' => array(
                                                'module' => 'security',
                                                'name' => 'rsa_key',
                                            ),
                                'limit'=> 1,
                                )
                            );
        self::$rsa_key = openssl_pkey_get_private($res['value']);
        return true;
    }
    

    public static function bootstrap() {
        return true;
    }
    

    public static function close() {
        return true;
    }
    
    public static function decrypt_rsa($data) {
        $decrypted = '';
        openssl_private_decrypt($data,$decrypted,self::$rsa_key);
        return $decrypted;
    }
    
    public static function decrypt_aes($data) {
        return true;
    }
    
    public static function encrypt_aes($data) {
        return true;
    }
}
?>
