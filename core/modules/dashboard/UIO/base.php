<?php
/**
 * The base class for all Marjor.am User Interface Objects (uio).
 *
 * @license    Modified BSD License (see LICENSE file)
 * @version    Release: 
 * @link       
 */


class UIO{
   private $name;
   private $options;
   
   public function __construct($name,$options){
        $this->name = $name;
        $this->options = $options;
        return true;
   }
   
}
?>
