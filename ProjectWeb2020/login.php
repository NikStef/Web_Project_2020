<?php
session_start();
include 'mapico.php';

$con = mysqli_connect('localhost', 'root', '','db_contact');

$username = $_POST['username'];
$pass = $_POST['pass'];

if (isset($_SESSION['session_username']))
{
	echo "Έχεις κάνει ήδη login <b>".$_SESSION['session_username']."</b>! Μια φορά αρκεί.";
	echo "<br><a href='logoff.php'>Log off</a>";
}
else
{
	$query="select username,password,isAdmin as admin from users where BINARY username = '$username' and BINARY password = '$pass'";
	$result = mysqli_query($con,$query );
	$en=$result->fetch_assoc();
	$count= mysqli_num_rows($result);
	if($count>0){
		if ($en['admin'] < 1){
			$_SESSION['session_username'] = $username;
			 $_SESSION['loggedIn'] = true;
			header('Location:u_index.php');
			//echo "Welcome <b>".$_SESSION['session_username'];
		}else{
			$_SESSION['session_username'] = $username;
			$_SESSION['adminloggedIn'] = true;
			header('Location:Admin/a_index.php');
			}
	}else
		{
			echo "Λάθος όνομα χρήστη ή κωδικός.";
			//echo "<br /><a href='login_form.php'></a>";
		}	
}

?>

