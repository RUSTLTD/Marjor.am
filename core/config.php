<?php
/**
 * Contains main configuration constants; Edit these with care.
 *
 * @license    Modified BSD License (see LICENSE file)
 *
 */
 
 // Database Configuration: Edit the "core" array to point to your Marjor.am database
 
 /* Default values:
    ------------------------
    $DB_Config = array(
        'core' => array(
            'type' => 'mysql',
            'host' => 'localhost',
            'user' => 'user',
            'password' => 'password',
            'database' => 'marjoram'
        )
    );
 */
 
 $DB_Config = array(
    'core' => array(
        'type' => 'mysql',
        'host' => 'localhost',
        'user' => 'user',
        'password' => 'password',
        'database' => 'marjoram'
    )
 );
 
 define('DATABASE_CONNECTIONS',serialize($DB_Config));
 define('NUMBER_DATABASE_TRIES_BEFORE_FAIL',10);
?>