<?php
    require_once(BASE_DIR.'/tests/config.php');
    
    class DatabaseModuleTester extends UnitTestCase {
        private $module = null;
        
        function DatabaseModuleTester(){
           parent::__construct('Database Module Inclusion Tester');
        }
        
        function testDatabaseModuleExistence(){
             $this->assertTrue(class_exists('Database'),'Database Module Exists');
        }
        
        function testDatabaseModuleInstallMethodExists(){
             $this->assertTrue(method_exists('Database','install'),'Database install method missing');
        }
        
        function testDatabaseModuleInstallMethodReturnsTrue(){
             $install = Database::install();
             $this->assertTrue($install,'Database install returned '.var_export($install,true).' (Expecting: true)');
        }
        
        function testDatabaseModuleInitMethodExists(){
             $this->assertTrue(method_exists('Database','init'),'Database init method missing');
        }
        
        function testDatabaseModuleBootstrapMethodExists(){
             $this->assertTrue(method_exists('Database','bootstrap'),'Database bootstrap method missing');
        }
        
        function testDatabaseModuleCloseMethodExists(){
             $this->assertTrue(method_exists('Database','close'),'Database close method missing');
        }
        
        function testDatabaseModuleCloseMethodReturnsTrue(){
             $close = Database::close();
             $this->assertTrue($close,'Database close returned '.var_export($close,true).' (Expecting: true)');
        }
        
    }
?>