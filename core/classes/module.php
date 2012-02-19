<? php
/**
 * The base class for all Marjor.am modules.
 *
 * @license    Modified BSD License (see LICENSE file)
 * @version    Release: 
 * @link       
 */


class module
{
    public static install() {
        return true;
    }
    public static init() {
        return true;
    }

    public static bootstrap() {
        return true;
    }
    
    public static close() {
        return true;
    }
}
?>
