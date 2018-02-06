<?php

require_once('db.php');
require_once('user.php');
require_once('functions.php');

$register_ok = true;
$reg_stmt = '';


$fields = array('r_name','r_surname','r_phone','r_email','r_pass1','r_pass2');
$error=emptyFields($fields,'');


	if(isset($_POST['r_submit'])){

		$register_user->addValues($fields);
		$register_ok = $register_user->ifEmptyFields();
		
		if(!$register_ok) {
			$reg_stmt="fill in the required fields";
			$register_ok=false;
		}

		$sanitized_email=filter_var($register_user->r_email,FILTER_SANITIZE_EMAIL);
		if($sanitized_email!=filter_var($register_user->r_email,FILTER_VALIDATE_EMAIL)){
			$error['r_email']='Wrong email';
			$register_ok=false;
		}

		if(!preg_match('/^[0-9\+]{8,13}$/',$register_user->r_phone) && $register_user->r_phone!=''){
			$error['r_phone']="wrong phone number";
			$register_ok=false;
		}

		if($register_user->r_pass1!=$register_user->r_pass2){
			$error['r_pass2']='Passwords are different';
			$reg_ok=false;
		}
		if(!isset($_POST['r_terms'])){
			$error_terms='Accept terms';
			$reg_ok=false;
		}
		$email=$register_user->r_email;
		$account_exists=$pdo->query("SELECT COUNT(*) FROM users WHERE email='$email'")->fetchColumn();

			if($account_exists[0]==0 && $register_ok = true){
					$hashed_pass = password_hash($register_user->r_pass1,PASSWORD_BCRYPT);
						if($results=$pdo->prepare("INSERT INTO users (name,surname,phone,email,password) VALUES (:name,:surname,:phone,:email,:password)")){
					
						$results->bindparam(':name',$register_user->r_name);
						$results->bindparam(':surname',$register_user->r_surname);
						$results->bindparam(':phone',$register_user->r_phone);
						$results->bindparam(':email',$register_user->r_email);
						$results->bindparam(':password',$hashed_pass);
						$results->execute();
						$_SESSION['id'] = $pdo->lastInsertId();
						header('Location:account.php');
						}
							}elseif($account_exists[0]>0){
								$error['r_email']='This email is busy';
								}
		include_once('form.php');
	}