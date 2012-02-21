<?php
/**
 * The base class for all Marjor.am modules.
 *
 * @license    Modified BSD License (see LICENSE file)
 * @version    Release: 
 * @link       
 */


class module{
    /*
    install() is called when the module is installed. This will happen 
    either as part of Marjoram's installation or via the dashboard.
    */
    public static install() {
        return true;
    }
    
    /*
    init() is called at the start of every request cycle. It is used 
    to determine and include requirements, and initialize class variables.
    */
    public static init() {
        return true;
    }
    
    /*
    bootstrap() is called after init() but before handeling the request. 
    It is for debug purposes, and not recommended for production use. 
    */
    public static bootstrap() {
        return true;
    }
    
    /*
    close() is called after the response is sent. It is used to close 
    database connections and acts as a deconstructor.
    */
    public static close() {
        return true;
    }
}
?>
