<?php
require_once('config.php');
	try{
		$parameters = new Config("localhost","contactsdb","utf8","root","");
		$pdo = new PDO('mysql:host='.$parameters->host.';dbname='.$parameters->dbname.';charset='.$parameters->charset,$parameters->username,$parameters->password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	}catch(PDOException $e){
		echo 'the connection can not be established'.$e->getMessage();
	}