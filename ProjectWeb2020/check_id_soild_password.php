<?php
include 'u_mapico.php';

$con = mysqli_connect('localhost', 'root', '','db_contact');

$newpass = $_POST['newpass'];


if (strlen($newpass) < 8){
	echo "O κωδικός πρεπει να είναι τουλάχιστον 8 χαρακτήρες.";
	die();
}elseif (!preg_match("/\d/", $newpass)) {
	echo "O κωδικός πρέπει να περιέχει τουλάχιστον 1 αριθμό.";
	die();
}elseif (!preg_match("/[A-Z]/", $newpass)) {
	echo "O κωδικός πρέπει να περιέχει τουλάχιστον 1 κεφαλαίο γράμμα.";
	die();
}elseif (!preg_match("/\W/", $newpass)) {
	echo "O κωδικός πρέπει να περιέχει ενα ειδικό χαρακτήρα.";
	die();
}else{
	
$sql = "UPDATE users SET password='$newpass' WHERE username='$username'";
	
if (!($con->query($sql) === TRUE)) {
		echo "Error: " . $sql . "<br>" . $con->error;
		}
		
header('Location: logoff.php');
}


?>