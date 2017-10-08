<?php

	require_once("./vendor/autoload.php");
	
	/* 
	
		1. Check if user is authorised using OAuth2, if authorised connect to database to Expose to API 
	
	*/
	if (oauth()){
		$api = new PHP_CRUD_API(array(
			'dbengine'=>'MySQL',
			'hostname'=>'localhost',
			'port'=>'3306',
			'username'=>'root',
			'password'=>'',
			'database'=>'govfish',
			'table_authorizer'=>function($cmd,$db,$tab) { return true; },

		));	
		$api->executeCommand();
	}
	else{
		echo "Sorry Mate, You cant touch this!";
	}
	
	function oauth(){
		return false;
	}

?>