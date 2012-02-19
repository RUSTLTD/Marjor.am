<?php
/**
 * DESCRIPTION FOR DATABASE MODULE
 *
 * @license    Modified BSD License (see LICENSE file)
 * @version    Release: 
 * @link       
 */
	
	
    class Database extends module{
        
        private static $databases = array();
    
        public static install(){

        }

        public static init(){
            if(
                !is_defined('DATABASE_CONNECTIONS')
                || !DATABASE_CONNECTIONS
                || !is_array($DB_array = unserialize(DATABASE_CONNECTIONS))
                || !isset($DB_array['core'])
            ){
                Logger::error('DATABASE_MISSINGDB','No database connections available.');
            }
            
            $DBO_dir = (is_defined(ABSOLUTE_DIR)?ABSOLUTE_DIR:'.').'/DBO';
            
            foreach($DB_array as $db_name=>$DB){
                if(!isset($DB['type']) || $DB['type']==''){
                    $DB['type'] = 'mysql';
                }
                
                if(!isset($DB['host']) || $DB['host']==''){
                    $DB['host'] = 'localhost';
                }
                
                if(
                    file_exists($file = $DBO_dir.'/'.$DB['type'].'.php') //There is a file named {DATABASE_TYPE}_dbo.php
                    && isset($DB['user'])
                    && isset($DB['password'])
                ){
                    require_once($file);
                    self::databases[$db_name] = new $DB['type']($DB['host'],$DB['username'],$DB['password']);
                }
            }
        }
        
      private static function delegate($function, $db, $args = null){
            if(!isset($args)){
                $args = $db;
                $db = 'core';
            }
            $this_db = self::databases[$db];
            return $this_db->$function($args);
        }
        
        public function save($db,$args = null){
            return self::delegate('save',$db,$args);
        }
        
        public function find($db,$args = null){
            return self::delegate('find',$db,$args);
        }
        
        public function delete($db,$args = null){
            return self::delegate('delete',$db,$args);
        }
        
        public function update($db,$args = null){
            return self::delegate('update',$db,$args);
        }
        
    }
?>