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
a{
	 display: block;
}
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src = "chart.js"> </script>

</head>
<body>
<?php include 'a_mapico.php';
 $con = mysqli_connect('localhost', 'root', '','db_contact');
	 if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	$count_id= 0;
	echo "<table>";
	echo "<tr>";
	echo "<th>";
	echo "Διάγραμμα";
	echo "</th>";
		// Content-Type
		$sqlavgct = "SELECT DISTINCT content_type FROM responses WHERE content_type <>''";
		$resultcc = $con->query($sqlavgct);
		echo "<tr>";
		echo "<td>";
		while($cc=$resultcc->fetch_assoc()){
			//count
			echo "<a><input type=\"checkbox\" id=$count_id >" ;
			echo $cc['content_type'];
			//echo $cc['content_type'];
			//echo "</option>" ;
			$count_id= $count_id +1;
		}
		//Μέρα
		echo "<tr>";
		echo "<td>";
		echo "<select id = \"mera\"  > ";
		echo "<option> ---Διάλεξε Μέρα--- </option>  ";
		echo "<option> Δευτέρα </option> ";
		echo "<option> Τρίτη </option>";
		echo "<option> Τετάρτη </option> ";
		echo "<option> Πέμπτη </option>";
		echo "<option> Παρασκευή </option>";
		echo "<option> Σάββατο </option>";
		echo "<option> Κυριακή </option>";
		echo "</select>  ";
		echo "</tr>";
		//Αιτήσεις
		$sql2 = "SELECT DISTINCT method FROM requests";
		$result2 = $con->query($sql2);
		echo "<tr>";
		echo "<td>";
		echo "<select id = \"method\"> ";
		echo "<option> ---Μέθοδο--- </option>  ";
		while($method=$result2->fetch_assoc()){
			echo "<option>" ;
			echo $method['method'];
			echo "</option>" ;
		}
		echo "</td>";
		echo "</tr>";
		//ISP
		$sqlisp = "SELECT DISTINCT isp AS count_uisp  FROM entries";
		$resultisp = $con->query($sqlisp);
		echo "<tr>";
		echo "<td>";
		echo "<select id = \"isp\" > ";
		echo "<option> ---Διάλεξε πάροχο--- </option>  ";
		while($uisp=$resultisp->fetch_assoc()){
			echo "<option>" ;
			echo $uisp['count_uisp'];
			echo "</option>" ;
		}
		echo "</td>";
		echo "</tr>";

	echo "</tr>";
	echo "</table>";	

?>

</body>

<!-- <button onclick="getdata()">Δείτε γράφημα.</button>  -->
<button onclick="getdata()">Δείτε γράφημα.</button>
<p> Τα δεδομένα σου:
	 <p><input type = "text" id = "epiloghmeras" size = "20" </p>


        
 

</html>