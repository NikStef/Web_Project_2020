<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<style>
.stoixeia{
  margin-top:90px;
  margin-left: 180px;
  margin-bottom: 30px;  
}
.pr{
	margin-left: 50px;
}

</style>
</head>
<body>
<?php include 'u_mapico.php';

	 $con = mysqli_connect('localhost', 'root', '','db_contact');
	 if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	
	 $sql1 = "SELECT * FROM users WHERE username = '$username'";
     $result1 = $con->query($sql1);
	 $lu=$result1->fetch_assoc();
	 
	 $sql2 = "SELECT COUNT(*) AS count_en  FROM entries WHERE username = '$username'";
     $result2 = $con->query($sql2);
	 $en=$result2->fetch_assoc();
	 

	 $sql3 = "SELECT COUNT(*) AS count_rq  FROM requests WHERE username = '$username'";
     $result3 = $con->query($sql3);
	 $rq=$result3->fetch_assoc();
	 
	 $sql4 = "SELECT COUNT(*) AS count_rp  FROM responses WHERE username = '$username'";
     $result4 = $con->query($sql4);
	 $rp=$result4->fetch_assoc();
	 
	 


?>

 <div id="stoixeia" class="stoixeia">
 
		<div class="">
            <p><strong>Username:</strong><?php echo $username;?></p>
            <p><strong>Last_Upload:</strong><?php echo $lu['last_upload'];?></p>
            <p><strong>Joined:</strong><?php echo $lu['joined'];?></p>
			<p><strong>Στοιχεία:</strong></p>
				<p><strong class="pr">Πλήθος Εγγραφών:</strong><?php echo $en['count_en'];?></p>
				<p><strong class="pr">Πλήθος Request:</strong><?php echo $rq['count_rq'];?></p>
				<p><strong class="pr">Πλήθος Response:</strong><?php echo $rp['count_rp'];?></p>		
         </div>
		 
 </div>


</body>
</html>
