<?php
include_once('registration.php');
include_once('sign_in.php');
include_once('user.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>

	<form action="registration.php" method="post">
		<h3>Registration</h3>
		<fieldset>
			
			<label for="r_name">Name:<i>*</i><br/></label>
			<input type="text" name="r_name" value="<?php echo $register_user->r_name; ?>"><br/>
				<?php echo $error['r_name'].'<br/>'; ?>

			<label for="r_surname">Surname:<i>*</i><br/></label>
			<input type="text" name="r_surname" value="<?php echo $register_user->r_surname ?>"><br/>
				<?php echo $error['r_surname'].'<br/>'; ?>

			<label for="r_phone">Telephone:<br/></label>
			<input type="text" name="r_phone" value="<?php echo $register_user->r_phone; ?>"><br/>
				<?php echo $error['r_phone'].'<br/>'; ?>

			<label for="r_email">Email:<i>*</i><br/></label>
			<input type="text" name="r_email" value="<?php echo $register_user->r_email; ?>"><br/>
				<?php echo $error['r_email'].'<br/>'; ?>

			<label for="r_pass1">Password:<i>*</i><br/></label>
			<input type="password" name="r_pass1"><br/>
				<?php echo $error['r_pass1'].'<br/>'; ?>

			<label for="r_pass2">Repeat password:<i>*</i><br/></label>
			<input type="password" name="r_pass2"><br/>
				<?php echo $error['r_pass2'].'<br/>'; ?>

			<label for="r_terms">Terms:<i>*</i></label>
			<input type="checkbox" name="r_terms" method="post"><br/>
				<?php if(isset($error_terms)){echo $error_terms.'<br/>';} ?>
			
				<p>* Required fields</p><br/>

			<input type="submit" name="r_submit" action="Submit"><br/><br/>

				<?php echo $reg_stmt; ?>
		</fieldset>
		
	</form>

		<form method="post" action="sign_in.php">
		<h3>Sign in</h3>
		
		<fieldset>
			
			<label for="l_email">Email(Login):</label><br/>
			<input type="text" name="l_email" value="<?php echo $l_email ?>"><br/>

			<label for="l_pass">Password:</label><br/>
			<input type="password" name="l_pass"><br/>
			<?php echo $l_error.'<br/>' ?>

			<input type="submit" name="l_submit"  >

		</fieldset> 

	</form>
    
</body>
</html>