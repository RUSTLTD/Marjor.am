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
    
    private static $use_openssl = false;
    private static $rsa = null;
    
    
    public static function install() {
        /* @TODO
		 * Set up Database
		 * Prompt for entropy
		 * Generate RSA Key
		 * Populate Database
		 */	
         
         //Also determine if user has OpenSSL installed; If so, use OpenSSL lib, else, include and use phpseclib (http://phpseclib.sourceforge.net)
         
        return true;
    }
    

    public static function init() {
        $res = Database::find(array(
                                'fields' => 'value',
                                'from' => 'system',
                                'where' => array(
                                                'module' => 'security',
                                                'name' => 'use_openssl',
                                            ),
                                'limit'=> 1,
                                )
                            );
        
        if($res['value']=='1'){
            self::$use_openssl = true;
        }else{
            set_include_path(get_include_path() . PATH_SEPARATOR . ABSOLUTE_DIR.'\lib\phpseclib');
            include('Crypt/RSA.php');
        }
        
        $res = Database::find(array(
            'fields' => 'value',
            'from' => 'system',
            'where' => array(
                            'module' => 'security',
                            'name' => 'rsa_key',
                        ),
            'limit'=> 1,
        ));
        
        if(!isset($res['value']) || $res['value']==''){
            Logger::error('SECURITY_NORSAKEY','No RSA key set for security! Please make sure you have completed Marjor.am installation.');
            return false;
        }
        
        self::$rsa_key = $res['value'];
        self::$rsa = new Crypt_RSA();
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
        if(self::$use_openssl){
            openssl_private_decrypt($data,$decrypted,self::$rsa_key);
        }else{
            
        }
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
