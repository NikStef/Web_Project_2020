<?php
session_start();
 $con = mysqli_connect('localhost', 'root', '','db_contact');
 if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
}
 $username = $_SESSION['session_username'];
 $sql = "SELECT entries.lat,entries.lon,COUNT(*)AS count FROM entries INNER JOIN responses ON entries.id = responses.response_id WHERE entries.lat<>0 and entries.lon<>0 and entries.username = '$username' and (responses.content_type LIKE '%html%'or responses.content_type LIKE '%php%' or responses.content_type LIKE '%jsp%' or responses.content_type LIKE '%asp%') GROUP BY entries.lat,entries.lon";
 $result = $con->query($sql);
 $heatmap_data = $result->fetch_all(MYSQLI_ASSOC);
 echo json_encode($heatmap_data);
?>