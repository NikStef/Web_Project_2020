<!DOCTYPE html>
 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

 <style>
   body {font-family: Arial, Helvetica, sans-serif;}  
  
	
	
	.first{
	margin-top:90px;
	margin-bottom: 30px; 
	display:block;
	}
	.second{
	margin-bottom: 30px; 
	display:block;
	}
	.email {
	margin-bottom: 30px;  
	display:block;
	}
	
	input[type=text],input[type=password]{
		width: 50%;
		padding: 12px 20px;
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
	label {
    display: inline-block;
    width: 10em; 
	}
	
	
}
</style>
</head>
<body>
	<?php include 'mapico.php';?>
<center>
	<h1>Με την ολοκλήρωση της εγγραφής πρέπει να συνδεθείτε.</h1>
   <form name="singup_form" method="POST" action="signup.php">  
		<div class="first">
			<label for="username">Όνομα Χρήστη:</label>
			<input type="text" id="username" name="username"  placeholder="Είσαγεται το όνομα χρήστη σας" required>
		</div>
		
		<div class="second">
			<label for="pass">Κωδικός:</label>
			<input type="password" id="pass" name="pass" placeholder="Εισάγεται τον κωδικό σας" required>
		</div>
		
		<div  class="email">
			<label for="email"> Email:</label>
			<input type="text" id="email" name="email"  placeholder="Εισάγεται τον e-mail σας" required>
		</div>
		<div>
		<button type="submit"> Εγγραφή</button>
		</div>
   </form>
</center>
</body>
   
 
</html>
