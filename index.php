<?php

	require_once("./vendor/autoload.php");
	
	/* Start hacking Shit */
	
	$api = new PHP_CRUD_API(array(
		'dbengine'=>'MySQL',
		'hostname'=>'localhost',
		'port'=>'3306',
		'username'=>'root',
		'password'=>'',
		'database'=>'govfish',
	));
	
	$api->executeCommand();
	
	$user = array(
		"username" => "John", 
		"password" => "123"
	);

?>