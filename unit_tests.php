<?php
    
    define('BASE_DIR','.');
    
    require_once(BASE_DIR.'/tests/config.php');
    
    //Include all tests
      if($handle = opendir(TEST_DIR)){
        while(($filename = readdir($handle)) !== false){
            if($filename != '.' 
               && $filename != '..' 
               && strpos($filename,'_test') !== false){
                require_once(TEST_DIR."/$filename");
            }
        }
     }
?>