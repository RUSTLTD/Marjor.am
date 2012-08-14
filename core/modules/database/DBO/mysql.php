<?php
/**
 * The base class for all Marjor.am Database Objects (dbo).
 *
 * @license    Modified BSD License (see LICENSE file)
 * @version    Release: 
 * @link       
 */


class MYSQL extends DBO{
    public function __construct($host,$database,$user,$pass){
        $this->host = $host;
        $this->database = $database;
        $this->user = $user;
        $this->pass = $pass;
        return true;
    }
   
   public function connect(){
        if(!isset($this->connection) || !$this->connection){
            $max_tries = 3;
            
            if(defined('NUMBER_DATABASE_TRIES_BEFORE_FAIL') && NUMBER_DATABASE_TRIES_BEFORE_FAIL!=''){
                $max_tries = (int)NUMBER_DATABASE_TRIES_BEFORE_FAIL;
            }
            
            for($try = 1; $try<=$max_tries; $try++){
                $this->connection = @mysql_connect($this->host, $this->user, $this->pass);
                if($this->connection!==false){
                    break;
                }
            }
            
            if($this->connection===false){
                Logger::error('MYSQLDBO_CONNECTIONFAIL','Connection to database, "'.$this->database.'" failed after '.$try.' tries. ('.mysql_error().')');
                return false;
            }
        }
        
        mysql_select_db($this->database);
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
        $sql_obj = mysql_query($sql,$this->connection);
        if($sql_obj === false){
            die(mysql_error());
            Logger::error('MYSQLDBO_QUERYERROR','Invalid query. ('.mysql_error().')');
            return false;
        }
        return mysql_fetch_array($sql_obj,MYSQL_ASSOC);
   }
   
   public function save($args){
        $sql = '';
        
        $primary_key = $this->query('SHOW KEYS FROM `table` WHERE Key_name = "PRIMARY"');
        if(is_array($primary_key) && isset($primary_key['Column_name'])){
            $p_key = $primary_key['Column_name'];
        }
        
        return $this->query($sql);
   }
   
   public function find($args){
        if(!isset($args['from']) && ((is_array($args['from']) && count($args['from'])>0) || is_string($args['from']))){
            Logger::error('MYSQLDBO_MISSINGFROM','Missing \'from\' attribute in find() query!');
            return false;
        }
        
        $fields = ((isset($args['fields']) && is_array($args['fields']) && count($args['fields'])>0)?('`'.implode('`,`',$args['fields']).'`'):((is_string($args['fields']))?'`'.$args['fields'].'`':'*'));
        $from = (is_array($args['from'])?implode('`, `',$args['from']):(string)$args['from']);
        $sql = 'SELECT '.$fields.' FROM `'.$from.'`';
        
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
        $sql = 'CREATE TABLE ';
        
        if(!isset($args['table']) && ((is_array($args['table']) && count($args['table'])>0) || is_string($args['table']))){
            Logger::error('MYSQLDBO_MISSINGTABLE','Missing \'table\' attribute in create_table() query!');
            return false;
        }
        
        $sql .= "`{$args['table']}`";
        
        if(isset($args['fields']) && is_array($args['fields']) && count($args['fields'])>0){
            $sql .= ' (';
            foreach($args['fields'] as $field){
                if(!isset($field['name']) || !isset($field['type'])){
                    Logger::error('MYSQLDBO_IMPROPERFIELD','Improper field in create_table() query! [Field info: '.var_dump($field,true).']');
                    return false;
                }
                $sql .= "`{$field['name']}` {$field['type']}";
                if(isset($field['auto_increment']) && $field['auto_increment']===true){
                    $sql .= ' AUTO_INCREMENT';
                }
                if(isset($field['unique']) && $field['unique']===true){
                    $sql .= ' UNIQUE';
                }
                if(isset($field['primary']) && $field['primary']===false){
                    $sql .= ' PRIMARY KEY';
                }
                if(isset($field['comment']) && $field['comment']!=""){
                    $sql .= ' COMMENT "'.$this->escape($field['comment']).'"';
                }
                if(isset($field['default']) && $field['comment']!=""){
                    $sql .= ' DEFAULT "'.$this->escape($field['default']).'"';
                }
            }
        }
        
        
        
        return $this->query($sql);
   }
   
   public function close(){
        $sql = '';
        
        return $this->query($sql);
   }
   
}
?>
