<?php
include_once('contacts.php');
include_once('account.php');

function createForm($f_name='',$f_surname='',$f_phone='',$f_address='',$f_email='',$f_category='',$f_note='',$error='',$id='') {?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php if($id != ''){echo 'Edit Contact'; }else{echo 'Add Contact';} ?></title>
</head>
<body>
	<h1><?php if($id != ''){echo 'Edit Contact'; }else{echo 'Add Contact';} ?></h1>

	<?php if($error != ''){echo '<div>'.$error.'</div>';} ?>

	<form action="" method="post">
		<?php if($id!=0) { ?>
			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
			<p>ID: <?php echo $id; ?></p>
		<?php } ?>

			<label for="c_name">Name:<i>*</i><br/></label>
			<input type="text" name="c_name" value="<?php echo $f_name ?>"><br/>

			<label for="c_surname">Surname:<i>*</i><br/></label>
			<input type="text" name="c_surname" value="<?php echo $f_surname ?>"><br/>

			<label for="r_phone">Telephone:<br/></label>
			<input type="text" name="c_phone" value="<?php echo $f_phone; ?>"><br/>

			<label for="r_phone">Address:<br/></label>
			<input type="text" name="c_address" value="<?php echo $f_address; ?>"><br/>

			<label for="c_email">Email:<br/></label>
			<input type="text" name="c_email" value="<?php echo $f_email; ?>"><br/>

			<label for="c_category">Category:<i>*</i><br/></label>	
				<select name="c_category">
					<option value="1">PRIVATE</option>
					<option value="2">BUSINESS</option>
				</select>
				<br>
			<label for="note">Note:<br/></label>
			<textarea name="note" value="<?php echo $f_note; ?>"></textarea><br/>

			<input type="submit" name="submit" action="Submit"><br/><br/>

		</fieldset>

	</form>

</body>
</html>

<?php }
if(isset($_GET['id'])){
		if(isset($_POST['submit'])){

			if(isset($_POST['id'])){
				$id=$_POST['id'];
				$name = htmlentities($_POST['c_name'],ENT_QUOTES);
				$surname = htmlentities($_POST['c_surname'],ENT_QUOTES);
				$phone = htmlentities($_POST['c_phone'],ENT_QUOTES);
				$address = htmlentities($_POST['c_address'],ENT_QUOTES);
				$email = htmlentities($_POST['c_email'],ENT_QUOTES);
				$category = htmlentities($_POST['c_category'],ENT_QUOTES);
				$note = htmlentities($_POST['c_note'],ENT_QUOTES);

		if($name=='' || $surname ==''){
			$error = 'Enter the name and surname';
			createForm($name,$surname,$address,$phone,$email,$category,$note,$error,$id);
		}else{
			$user->editContact($id,$name,$surname,$phone,$address,$email,$category,$note);
			header('Location:account.php');
		}

			}

		}else{
			if (is_numeric($_GET['id']) && $_GET['id'] > 0) {
				$id = $_GET['id'];

					foreach ($user->contacts as $key => $value) {
						if($value['id']==$id){
							$name=$value['name'];
							$surname=$value['surname'];
							$phone=$value['phone'];
							$address=$value['address'];
							$email=$value['email'];
							$category=$value['categoryId'];
							$note=$value['note'];
						}
					}
				createForm($name,$surname,$address,$phone,$email,$category,$note,NULL,$id);
			}else{
				header('Location:account.php');
			}
		}
}else{
	if(isset($_POST['submit'])){
		$name = htmlentities($_POST['c_name'],ENT_QUOTES);
		$surname = htmlentities($_POST['c_surname'],ENT_QUOTES);
		$phone = htmlentities($_POST['c_phone'],ENT_QUOTES);
		$address = htmlentities($_POST['c_address'],ENT_QUOTES);
		$email = htmlentities($_POST['c_email'],ENT_QUOTES);
		$category = htmlentities($_POST['c_category'],ENT_QUOTES);
		$note = htmlentities($_POST['c_note'],ENT_QUOTES);

		if($name=='' || $surname ==''){
			$error = 'Enter the name and surname';
			createForm($name,$surname,$address,$phone,$email,$category,$note,$error,NULL);
		}else{
			$user->addContact($name,$surname,$phone,$address,$email,$category,$note);
			header('Location:account.php');
		}
	}else{
		createForm();
	}
}
?>

