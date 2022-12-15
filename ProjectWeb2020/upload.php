<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

 <style>
   body {font-family: Arial, Helvetica, sans-serif;}  
  
	.filleto{
	margin-left: 250px;
	margin-top:80px;
	}
	.btw{
	margin-left: 250px;
	margin-top:20px;
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
	button {
	background-color: #04AA6D;
	color: white;
	padding: 10px 21px;
	cursor: pointer;
	}
}
</style>
<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
</head>
	
<?php
  include 'u_mapico.php';
?>

<body>


<div class="filleto">Εισάγεται το .har αρχείο:
	<input type="file" id="haris" accept=".har"/>
	<button id="flt">Επεξεργασία.</button>
</div>


<div class="btw">
	<form id="save_har" method="post" action = "save_har.php">
		<input type = "text" name ="reconstructed1" id = "reconstructed1" placeholder="Έτοιμο όταν γεμίσει. " required onkeydown="return false;">
		<input type ="submit" value = "Αποθήκευση Τοπικά.">
	</form>
</div>

<div class="btw">
	<form id="db_upload" method="post" action = "db_upload.php">
		<input type = "text" name ="reconstructed2" id = "reconstructed2"placeholder="Έτοιμο όταν γεμίσει." required onkeydown="return false;">
		<input type = "text" name ="ip" id = "ip" placeholder="Έτοιμο όταν γεμίσει." required onkeydown="return false;" >
		<!-- <input type = "text" name ="city" id = "city"placeholder="Έτοιμο όταν γεμίσει." required onkeydown="return false;"> -->
		<input type = "text" name ="org" id = "org"placeholder="Έτοιμο όταν γεμίσει." required onkeydown="return false;">
		<input type ="submit" value = "Upload στην Βάση Δεδομένων.">
	</form>
</div>

<script src = "reconstruction.js"> </script>


</body>

</html>
