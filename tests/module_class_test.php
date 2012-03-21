<?php
    require_once(BASE_DIR.'/tests/config.php');
    
    class ModuleClassTester extends UnitTestCase {
        private $module = null;
        
        function ModuleClassTester(){
           parent::__construct('Module Class Inclusion Tester');
        }
        
        function testModuleClassExistence(){
             $this->assertTrue(class_exists('Module'),'Module Class Exists');
        }
        
        function testModuleClassInstallMethodExists(){
             $this->assertTrue(method_exists('Module','install'),'Module install method missing');
        }
        
        function testModuleClassInstallMethodReturnsTrue(){
             $install = Module::install();
             $this->assertTrue($install,'Module install returned '.var_export($install,true).' (Expecting: true)');
        }
        
        function testModuleClassInitMethodExists(){
             $this->assertTrue(method_exists('Module','init'),'Module init method missing');
        }
        
        function testModuleClassInitMethodReturnsTrue(){
             $init = Module::init();
             $this->assertTrue($init,'Module init returned '.var_export($init,true).' (Expecting: true)');
        }
        
        function testModuleClassBootstrapMethodExists(){
             $this->assertTrue(method_exists('Module','bootstrap'),'Module bootstrap method missing');
        }
        
        function testModuleClassBootstrapMethodReturnsTrue(){
             $bootstrap = Module::bootstrap();
             $this->assertTrue($bootstrap,'Module bootstrap returned '.var_export($bootstrap,true).' (Expecting: true)');
        }
        
        function testModuleClassCloseMethodExists(){
             $this->assertTrue(method_exists('Module','close'),'Module close method missing');
        }
        
        function testModuleClassCloseMethodReturnsTrue(){
             $close = Module::close();
             $this->assertTrue($close,'Module close returned '.var_export($close,true).' (Expecting: true)');
        }
        
    }
?>