<?php
/**
 * Class responsible for text translation and localization; Phrases are referenced using a look-up table and returned if a translation is found
 *
 * @license    Modified BSD License (see LICENSE file)
 * @version    Release: 
 * @link       
 */
	
	
    class Localization extends module{
        public static function install(){

        }

        public static function init(){
            if(!defined('LANGUAGE') || !LANGUAGE){
                define('LANGUAGE','en');
            }
        }

        public static function translate($string){

            /* 
			If we find a line in the localization database for the given
			language and text, return it; otherwise return the untranslated
			string.
			*/

            if($replacement = Database::find(
			    array(
                    'from'=>'localization',
                    'where'=>array(
                        'language'=>LANGUAGE,
                        'text'=>DB::escape($string)
                    ),
                    'limit'=>1
                )
			)){
				return $replacement;
			}
			return $string; 
        }
    }

	// Helper function with short name to call Localization translate function
    function t($string){
        return Localization::translate($string);
    }
?>