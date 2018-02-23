<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=uhff',
	'emulatePrepare' => true,
	// 'username' => 'uhff',
	// 'password' => 'uhff123',
	'username' => 'root',
	'password' => 'root',
	'charset' => 'utf8',
	
);