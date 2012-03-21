<?php
    require_once(BASE_DIR.'/tests/config.php');
    
    class LoggerModuleTester extends UnitTestCase {
        private $module = null;
        
        function LoggerModuleTester(){
           parent::__construct('Logger Module Inclusion Tester');
        }
        
        function testLoggerModuleExistence(){
             $this->assertTrue(class_exists('Logger'),'Logger Module Exists');
        }
        
        function testLoggerModuleInstallMethodExists(){
             $this->assertTrue(method_exists('Logger','install'),'Logger install method missing');
        }
        
        function testLoggerModuleInstallMethodReturnsTrue(){
             $install = Logger::install();
             $this->assertTrue($install,'Logger install returned '.var_export($install,true).' (Expecting: true)');
        }
        
        function testLoggerModuleInitMethodExists(){
             $this->assertTrue(method_exists('Logger','init'),'Logger init method missing');
        }
        
        function testLoggerModuleBootstrapMethodExists(){
             $this->assertTrue(method_exists('Logger','bootstrap'),'Logger bootstrap method missing');
        }
        
        function testLoggerModuleCloseMethodExists(){
             $this->assertTrue(method_exists('Logger','close'),'Logger close method missing');
        }
        
        function testLoggerModuleCloseMethodReturnsTrue(){
             $close = Logger::close();
             $this->assertTrue($close,'Logger close returned '.var_export($close,true).' (Expecting: true)');
        }
        
    }
?>