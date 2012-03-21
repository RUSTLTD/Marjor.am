<?php
    require_once(BASE_DIR.'/tests/config.php');
    
    class AuthenticationModuleTester extends UnitTestCase {
        private $module = null;
        
        function AuthenticationModuleTester(){
           parent::__construct('Authentication Module Inclusion Tester');
        }
        
        function testAuthenticationModuleExistence(){
             $this->assertTrue(class_exists('Authentication'),'Authentication Module Exists');
        }
        
        function testAuthenticationModuleInstallMethodExists(){
             $this->assertTrue(method_exists('Authentication','install'),'Authentication install method missing');
        }
        
        function testAuthenticationModuleInstallMethodReturnsTrue(){
             $install = Authentication::install();
             $this->assertTrue($install,'Authentication install returned '.var_export($install,true).' (Expecting: true)');
        }
        
        function testAuthenticationModuleInitMethodExists(){
             $this->assertTrue(method_exists('Authentication','init'),'Authentication init method missing');
        }
        
        function testAuthenticationModuleBootstrapMethodExists(){
             $this->assertTrue(method_exists('Authentication','bootstrap'),'Authentication bootstrap method missing');
        }
        
        function testAuthenticationModuleCloseMethodExists(){
             $this->assertTrue(method_exists('Authentication','close'),'Authentication close method missing');
        }
        
        function testAuthenticationModuleCloseMethodReturnsTrue(){
             $close = Authentication::close();
             $this->assertTrue($close,'Authentication close returned '.var_export($close,true).' (Expecting: true)');
        }
        
    }
?>