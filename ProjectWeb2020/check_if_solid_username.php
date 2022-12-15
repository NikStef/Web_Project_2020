<?php
include 'u_mapico.php';

$con = mysqli_connect('localhost', 'root', '','db_contact');

$newus = $_POST['newus'];

//echo $newus;
if($newus != ""){
	$sql_u = "SELECT COUNT(*) AS count_newus FROM users WHERE username='$newus'";
	$result1 = $con->query($sql_u);
	$uc=$result1->fetch_assoc();
	
	//echo $uc['count_newus'];
	
	if ($uc['count_newus']> 0) {
		 echo ("To όνομα χρήστη υπάρχει ήδη."); 	
	}else{
		//echo ("Η αλλαγή ολοκληρώθηκε.Αποσύνδεση σε 5...4...");
		$sql = "UPDATE users SET username='$newus' WHERE username='$username'";
		if (!($con->query($sql) === TRUE)) {
		echo "Error: " . $sql . "<br>" . $con->error;
		}
		
		$sql1 = "UPDATE responses SET username='$newus' WHERE username='$username'";
		if (!($con->query($sql1) === TRUE)) {
		echo "Error: " . $sql1 . "<br>" . $con->error;
		}
		
		$sql2 = "UPDATE entries SET username='$newus' WHERE username='$username'";
		if (!($con->query($sql2) === TRUE)) {
		echo "Error: " . $sql2 . "<br>" . $con->error;
		}
		
		$sql3 = "UPDATE requests SET username='$newus' WHERE username='$username'";
		if (!($con->query($sql3) === TRUE)) {
		echo "Error: " . $sql3 . "<br>" . $con->error;
		}
		
		//sleep(5);
		header('Location: logoff.php');
		
		
	}
}


?>