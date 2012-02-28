<?php
/**
 * The base class for all Marjor.am Database Objects (dbo).
 *
 * @license    Modified BSD License (see LICENSE file)
 * @version    Release: 
 * @link       
 */


class MYSQL extends DBO{
   
   public function connect(){
        if(!isset($this->connection) || !$this->connection){
            for($try = 1; $try<=(is_defined('NUMBER_DATABASE_TRIES_BEFORE_FAIL') && NUMBER_DATABASE_TRIES_BEFORE_FAIL!='')?NUMBER_DATABASE_TRIES_BEFORE_FAIL:3; $try++){
                $this->connection = mysql_connect($this->host, $this->user, $this->pass);
                if($this->connection!==false){
                    return true;
                }
            }
            Logger::error('MYSQLDBO_CONNECTIONFAIL','Connection to database, "'.$this->database.'" failed after '.$try.' tries. ('.mysql_error().')');
            return false;
        }
        return true;
   }
   
   public function escape($string){
        if($this->connect()===false){
            return false;
        }
        return mysql_real_escape_string($string,$this->connection);
   }
   
   public function query($sql){
        if($this->connect()===false){
            return false;
        }
        $sql_obj = mysql_query($sql_obj,$this->connection);
        return mysql_fetch_array($sql_obj,'MYSQL_ASSOC');
   }
   
   public function save($args){
        $sql = '';
        
        $primary_key = $this->query('SHOW KEYS FROM table WHERE Key_name = "PRIMARY"');
        die(print_r($primary_key));
        
        return $this->query($sql);
   }
   
   public function find($args){
        if(!isset($args['from'])){
            Logger::error('MYSQLDBO_MISSINGFROM','Missing \'from\' attribute in find() query!');
            return false;
        }
        
        $sql = 'SELECT '.(isset($args['fields'])?('`'.implode('`,`',$args['fields']).'`'):'*').' FROM `'.implode('`, `',$args['from']).'`';
        
        if(isset($args['where']) && is_array($args['where']) && count($args['where']) > 0){
            $sql .= ' WHERE ';
            $i = 0;
            $where_count = count($args['where']);
            foreach($args['where'] as $col=>$val){
                ++$i;
                $sql .= "`$col` = ".(is_numeric($val)?$this->escape($val):"'$val'").($i<$where_count?' AND ':'');
            }
        }
        
        if(isset($args['order']) && is_array($args['order']) && count($args['order']) > 0){
            $sql .= ' ORDER BY `'.implode('`, `',$args['order']);
        }
        
        
        if(isset($args['limit']) && is_numeric($args['limit'])){
            $sql .= ' LIMIT '.$args['limit'];
        }
        
        return $this->query($sql);
   }
   
   public function delete($args){
        $sql = '';
        
        return $this->query($sql);
   }
   
   public function create_table($args){
        $sql = '';
        
        return $this->query($sql);
   }
   
   public function close(){
        $sql = '';
        
        return $this->query($sql);
   }
   
}
?>
