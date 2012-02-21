<?php
/**
 * The base class for all Marjor.am Database Objects (dbo).
 *
 * @license    Modified BSD License (see LICENSE file)
 * @version    Release: 
 * @link       
 */


class MYSQL extends DBO{
   private $database;
   private $host;
   private $user;
   private $pass;
   private $connection;
   
   public function connect(){
        for($try = 1; $try<=(is_defined('NUMBER_DATABASE_TRIES_BEFORE_FAIL') && NUMBER_DATABASE_TRIES_BEFORE_FAIL!='')?NUMBER_DATABASE_TRIES_BEFORE_FAIL:3; $try++){
            $this->connection = mysql_connect($this->host, $this->user, $this->pass);
            if($this->connection!==false){
                return true;
            }
        }
        Logger::error('MYSQLDBO_CONNECTIONFAIL','Connection to database, "'.$this->database.'" failed after '.$try.' tries. ('.mysql_error().')');
        return false;
   }
   
   public function query($args){
        if((!isset($this->connection) || !$this->connection) && !$this->connect()){
            return false;
        }
        return true;
   }
   
   public function save($args){
        return true;
   }
   
   public function find($args){
        return true;
   }
   
   public function delete($args){
        return true;
   }
   
   public function update($args){
        return true;
   }
   
   public function create_table($args){
        return true;
   }
   
   public function close(){
        return true;
   }
   
}
?>
