<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

 <style>
 body {font-family: Arial, Helvetica, sans-serif;}


.us{
  margin-top:90px;
  margin-left: 150px;
  margin-bottom: 30px;  
}
.ps{
  margin-left: 150px;
  margin-bottom: 30px; 
}
input[type=text]{
  width: 50%;
  padding: 12px 20px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box; 
}

input[type=password] {
   width: 50%;
  padding: 12px 20px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
	width: 10%;
	margin-left: 150px;  
	background-color: #04AA6D;
	color: white;
	padding: 10px 21px;
	border: none;
	cursor: pointer;
	
}
button:hover {
  opacity: 0.9;
}
.signupbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #1C71E4;
}
label {
    display: inline-block;
    width: 10em; 
}
</style>
</head>
<body>
<?php include 'mapico.php';?>

	<?php


	session_start();

	?>

<center>
  
   <form class ="dt" name="login_form" method="POST" action="login.php">  
		<div class="us">
			<label for="username">Όνομα Χρήστη:</label>
			<input type="text" id="username" name="username"  placeholder="Είσαγεται το όνομα χρήστη σας" required>
		</div>
		<div class="ps">
			<label for="pass">Κωδικός:</label>
			<input type="password" id="pass" name="pass" placeholder="Εισάγεται τον κωδικό σας"  required>
		</div>
		<button type="submit">Σύνδεση</button>
		<a href=signup_form.php><button type="button"  class="signupbtn">Εγγραφή</button>
   </form>
 
</center>

</body>
</html>
