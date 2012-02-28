<?php
/**
 * Contains main configuration constants; Edit these with care.
 *
 * @license    Modified BSD License (see LICENSE file)
 *
 */
 
 // Database Configuration: Edit the "core" array to point to your Marjor.am database
 $DB_Config = array(
    'core' => array(
        'type' => 'mysql',
        'host' => 'localhost',
        'database' => 'marjoram'
    )
 );
 
 define('DATABASE_CONNECTIONS',serialize($DB_Config));
 
?>