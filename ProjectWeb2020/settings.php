<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<style>
.ep_prof{
  margin-top:50px;
  margin-left: 180px;
}
input[type=text]{
  width: 50%;
  padding: 12px 20px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box; 
}
input[type=submit]{
	width: 20%;
	background-color: #04AA6D;
	color: white;
	padding: 10px 21px;
}
</style>
</head>
<body>
<?php include 'u_mapico.php';

	 $con = mysqli_connect('localhost', 'root', '','db_contact');
	 if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	/*
	 $sql1 = "SELECT * FROM users WHERE username = '$username'";
     $result1 = $con->query($sql1);
	 $lu=$result1->fetch_assoc();
	 
	 $sql2 = "SELECT COUNT(*) AS count_en  FROM entries WHERE username = '$username'";
     $result2 = $con->query($sql2);
	 $en=$result2->fetch_assoc();
	 */
	 

?>


 <div id="ep_prof" class="ep_prof">
	<div>ΑΥΤΗ Η ΔΙΑΔΙΚΑΣΙΑ ΘΑ ΣΑΣ ΑΠΟΣΥΝΔΕΣΕΙ ΑΥΤΌΜΑΤΑ.</div>
	<div>
		<form id="new_us" method="post" action = "check_if_solid_username.php">
		<input type = "text" name ="newus" id = "newus" placeholder="Εισάγεται νέο όνομα χρήστη.">
		<input type ="submit" value = "Αλλαγή ονόματος Χρήστη.">
	</form>
	<div>
		<form id="new_pass" method="post" action = "check_id_soild_password.php">
		<input type = "text" name ="newpass" id = "newpass" placeholder="Είσάγεται νέο κωδικό.">
		<input type ="submit" value = "Αλλαγή Κωδικού.">
	</form>



</body>
</html>