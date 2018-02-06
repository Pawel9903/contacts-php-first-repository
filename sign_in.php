<?php

require_once('db.php');
require_once('user.php');
require_once('functions.php');

$l_error='';
$l_email='';

if(isset($_POST['l_submit'])){
	$l_email=htmlspecialchars($_POST['l_email']);
	$l_pass=htmlspecialchars($_POST['l_pass']);

	if($l_email==''||$l_pass==''){
		$l_error='Complete the require fields';
		}
		$sql=$pdo->query("SELECT * FROM users WHERE email='$l_email'");
		$pass_from_db=$sql->fetch();
	if(password_verify($l_pass,$pass_from_db['password'])){
		$_SESSION['id']=$pass_from_db['id_user'];
		header('Location:account.php');
	}else{
		$l_error='Invalid email or password';
	}
	include_once('form.php');
}

