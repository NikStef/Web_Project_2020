<!DOCTYPE html>
<?php
  session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<style>

body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed; //positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled
  z-index: 0; //overlaping-higher index on top
  top: 0;
  left: 0;
  background-color: #FFFFFF;
  padding-top: 60px; //xoros apo pano
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none; //u,b,-
  font-size: 25px;
  color: #818181;
  display: block; // ana block 
}
.sidenav b{
  padding: 0px 0px 0px 32px;
  text-decoration: none; //u,b,-
  font-size: 25px;
  color: #000000;
  display: block; // ana block 
}

.sidenav a:hover {
  color: #5da6f0;
}


</style>
</head>
<body>
<?php
$username = $_SESSION['session_username'];

if(!($_SESSION['adminloggedIn'])){
	if(!($_SESSION['loggedIn'])){
      header('Location: ../login_form.php'); 
	}else{
	  header('Location: ../u_index.php');
	} 
}

date_default_timezone_set('Europe/Athens');
$today = date("m.d.y");

?>
<div id="mySidenav" class="sidenav">
  <a href="a_index.php"><img src="logo.png"style="width:70px; height:120px;"></a>
  <b>Καλωσόρισες,Αφεντικό.</b>
  <b>Έφερα,καφέ.</b>
  <a href='basic_info.php'> Πληροφορίες</a>
  <a href='chart_try.php'> Ανάλυση Χρονικών Αποκρίσεων</a>
  <a href='admin_logout.php'> Αποσύνδεση</a>
</div>

</body>
</html> 