<?php
/**
 * The base class for all Marjor.am Database Objects (dbo).
 *
 * @license    Modified BSD License (see LICENSE file)
 * @version    Release: 
 * @link       
 */


class DBO{
   private $database;
   private $host;
   private $user;
   private $pass;
   private $connection;
   
   public function __construct($host,$user,$pass){
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        return true;
   }
   
   public function connect(){
        return true;
   }
   
   public function query($args){
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
