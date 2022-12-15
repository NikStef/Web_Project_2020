<?php
include 'mapico.php';
$con = mysqli_connect('localhost', 'root', '','db_contact'); //θα μπορούσα να τα κάνω ολα ενα αρχειο π κάνω include

$username = $_POST['username'];
$pass = $_POST['pass'];
$email = $_POST['email'];

$sql_u = "SELECT COUNT(*) AS count_newus FROM users WHERE username='$username'";
$result1 = $con->query($sql_u);
$uc=$result1->fetch_assoc();
if ($uc['count_newus']> 0) {
		echo ("To όνομα χρήστη υπάρχει ήδη."); 
		echo "<br><a href='signup_form.php'>Προσπαθήστε ξανά;</a>";
		die();		 
}

if (strlen($pass) < 8){ 
	echo "O κωδικός πρεπει να είναι τουλάχιστον 8 χαρακτήρες.";
	echo "<br><a href='signup_form.php'>Προσπαθήστε ξανά;</a>";
	die();
}elseif (!preg_match("/\d/", $pass)) {
	echo "O κωδικός πρέπει να περιέχει τουλάχιστον 1 αριθμό.";
	echo "<br><a href='signup_form.php'>Προσπαθήστε ξανά;</a>";
	die();
}elseif (!preg_match("/[A-Z]/", $pass)) {
	echo "O κωδικός πρέπει να περιέχει τουλάχιστον 1 κεφαλαίο γράμμα.";
	echo "<br><a href='signup_form.php'>Προσπαθήστε ξανά;</a>";
	die();
}elseif (!preg_match("/\W/", $pass)) {
	echo "O κωδικός πρέπει να περιέχει ενα ειδικό χαρακτήρα.";
	echo "<br><a href='signup_form.php'>Προσπαθήστε ξανά;</a>";
	die();
}


if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
  echo("Το $email δεν έχει την σωστή μορφή Ε-μαιλ");
  echo "<br><a href='signup_form.php'>Προσπαθήστε ξανά;</a>";
  die();
}



$sql = "INSERT INTO users (isAdmin,username, password, email,joined) VALUES ('0','$username', '$pass', '$email','$today')";



if (!($con->query($sql) === TRUE)) {
		echo "Error: " . $sql . "<br>" . $con->error;
	}

?>
