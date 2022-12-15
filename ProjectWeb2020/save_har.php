<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

 <style>
  
body  {
	background-image: url("Construction.png");
	background-repeat:no-repeat;
	background-attachment: fixed;
	background-position: center;  
	}
h1{
	position: absolute;
    top: 10%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);  
	font-family:Philly Sans;
    height:350;
}
</style>
</head>

<body>

<?php
	include 'u_mapico.php';

	$reconstructed = $_POST["reconstructed1"];
	$RC = fopen("reconstructed.har", "w"); //mode w = μονο για γράψιμο κ αν δν υπάρχει το φτιάχνει,αλλιώς over
	fwrite($RC, $reconstructed);
	fclose($RC);

?>
<h1>Το αρχείο .har αποθηκεύτηκε επιτυχώς.</h1>

</body>

</html>
