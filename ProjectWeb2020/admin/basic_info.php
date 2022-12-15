<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<style>
table{
  margin-top:50px;
  margin-left: 250px;
}
table, th,td{
  width: 80%;    
  background-color: #f1f1c1;
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>
<?php include 'a_mapico.php';

	 $con = mysqli_connect('localhost', 'root', '','db_contact');
	 if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	echo "<table>";
	echo "<tr>";
	//Πλήθος Χρηστών
	$sql1 = "SELECT COUNT(*) AS count_us  FROM users WHERE isAdmin =0";
    $result1 = $con->query($sql1);
	$us=$result1->fetch_assoc();
		echo "<tr>";
		echo "<th>";
		echo "Πλήθος Χρηστών:";
		echo "</th>";
		echo "<td>";
		echo $us['count_us'];
		echo "</td>";
		echo "</tr>";
	//Αιτήσεις
	$sql2 = "SELECT method,COUNT(*) AS count_m  FROM requests GROUP BY method";
    $result2 = $con->query($sql2);
	//$method=$result2->fetch_assoc();
		echo "<tr>";
		echo "<th>";
		echo "Πλήθος εγγραφών ανά τύπο αίτησης:";
		echo "</th>";
		echo "</tr>";
	while($method=$result2->fetch_assoc()){
		echo "<tr>";
		echo "<td>";
		echo $method['method'];
		echo "</td>";
		echo "<td>";
		echo $method['count_m'];
		echo "</td>";
		echo "</tr>";
	}
	//status
	$sql0 = "SELECT status,COUNT(*) AS count_0  FROM responses GROUP BY status";
    $result0 = $con->query($sql0);
	//$c0=$result0->fetch_assoc();
		echo "<tr>";
		echo "<th>";
		echo "Πλήθος εγγραφών ανά κωδικό απόκρισης:";
		echo "</th>";
		echo "</tr>";
	while($status=$result0->fetch_assoc()){
		echo "<tr>";
		echo "<td>";
		echo $status['status'];
		echo "</td>";
		echo "<td>";
		echo $status['count_0'];
		echo "</td>";
		echo "</tr>";
	}
	//Domain
	$sqldom = "SELECT COUNT(DISTINCT url) AS count_udomain  FROM requests";
    $resultdom = $con->query($sqldom);
	$udomain=$resultdom->fetch_assoc();
		echo "<tr>";
		echo "<th>";
		echo "Μοναδικά Domains:";
		echo "</th>";
		echo "<td>";
		echo $udomain['count_udomain'];
		echo "</td>";
		echo "</tr>";
	//ISP
	$sqlisp = "SELECT COUNT(DISTINCT isp) AS count_uisp  FROM entries";
    $resultisp = $con->query($sqlisp);
	$uisp=$resultisp->fetch_assoc();
		echo "<tr>";
		echo "<th>";
		echo "Μοναδικοί Πάροχοι:";
		echo "</th>";
		echo "<td>";
		echo $uisp['count_uisp'];
		echo "</td>";
		echo "</tr>";
	//mesh timh isto
	$sqlavgct = "SELECT content_type,AVG(age) AS count_avg FROM responses WHERE content_type <>''   GROUP BY content_type";
    $resultavgvt = $con->query($sqlavgct);
		echo "<tr>";
		echo "<th>";
		echo "Μέση ηλικία των αντικειμένων ανά CONTENT_TYPE:";
		echo "</th>";
		echo "</tr>";
	while($avg=$resultavgvt->fetch_assoc()){
		echo "<tr>";
		echo "<td>";
		echo $avg['content_type'];
		echo "</td>";
		echo "<td>";
		echo $avg['count_avg'];
		echo "</td>";
		echo "</tr>";
	}
	echo "</tr>";
	echo "</table>";	
?>




</body>
</html>