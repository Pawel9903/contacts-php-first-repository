<?php
session_start();
include_once('contacts.php');
include_once('db.php');
if(isset($_SESSION['id'])){
	if(isset($_POST['logout'])){
		session_unset($_SESSION['id']);
		session_destroy();
		header('Location:index.php');
	}else{
		$user = new Contacts($pdo,$_SESSION['id']);
		$user->GetContacts('id');
	}
}else{
	header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account</title>
</head>
<body>
	<?php echo '<h2>Welcome </h>'.$user->userData['0']['name'];?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="submit" name="logout" value="Logout">
	</form>


	<h1>Contacts</h1>
	<table border='1' cellapadding='10'>
		<tr><th>ID</th><th>NAME</th><th>SURNAME</th><th>PHONE</th><th>EMAIL</th><th>ADDRESS</th><th>CATEGORY</th><th>NOTE</th></tr>
		<?php
		
		foreach ($user->contacts as $key => $value) {
			echo '<tr>';
			foreach ($value as $columnName => $valueName) {
				if($columnName=="categoryId" && $valueName=='1'){echo "<td>PRIVATE</td>";}
				elseif($columnName=="categoryId" && $valueName=='2'){echo "<td>BUSINESS</td>";}
				else{echo "<td>".$valueName."</td>";}
				
				
				}
				echo "<td><a href ='edit.php?id=".$value['id']."'>Edit</a></td>";
				echo "<td><a href ='delete.php?id=".$value['id']."'>Delete</a></td>";
				echo "</tr>";
			}
		?>
	</table>
	<a href="edit.php">Add Contact</a>

</body>
</html>