<?php
    require_once(BASE_DIR.'/tests/config.php');
    
    class LocalizationModuleTester extends UnitTestCase {
        private $module = null;
        
        function LocalizationModuleTester(){
           parent::__construct('Localization Module Inclusion Tester');
        }
        
        function testLocalizationModuleExistence(){
             $this->assertTrue(class_exists('Localization'),'Localization Module Exists');
        }
        
        function testLocalizationModuleInstallMethodExists(){
             $this->assertTrue(method_exists('Localization','install'),'Localization install method missing');
        }
        
        function testLocalizationModuleInstallMethodReturnsTrue(){
             $install = Localization::install();
             $this->assertTrue($install,'Localization install returned '.var_export($install,true).' (Expecting: true)');
        }
        
        function testLocalizationModuleInitMethodExists(){
             $this->assertTrue(method_exists('Localization','init'),'Localization init method missing');
        }
        
        function testLocalizationModuleBootstrapMethodExists(){
             $this->assertTrue(method_exists('Localization','bootstrap'),'Localization bootstrap method missing');
        }
        
        function testLocalizationModuleCloseMethodExists(){
             $this->assertTrue(method_exists('Localization','close'),'Localization close method missing');
        }
        
        function testLocalizationModuleCloseMethodReturnsTrue(){
             $close = Localization::close();
             $this->assertTrue($close,'Localization close returned '.var_export($close,true).' (Expecting: true)');
        }
        
    }
?>