<?php
include_once('contacts.php');
include_once('account.php');

if(isset($_GET['id']) && is_numeric($_GET['id'])){
	$user->deleteContact($_GET['id']);

	header('Location:account.php');
}else{
	header('Location:account.php');
}