<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<style>
 body  {
	background-image: url("elevator.png");
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
<?php
  include 'u_mapico.php';
  
  $reconstructed = $_POST["reconstructed2"];
  
  $ip = $_POST["ip"];
  //$city = $_POST["city"];
  $isp = $_POST["org"];
  
  $con = mysqli_connect('localhost', 'root', '','db_contact');

  $data = json_decode($reconstructed, true);
  
  $entries = $data['entries'];
  $entriesLength = count($entries);
 
	
  for($i=0;$i<$entriesLength;$i++){
	//μηδενισμοί
	$startedDateTime="";
	$timings_wait="";
	$serverIPAddress="";
	$lat="";
	$lon="";
	
	$request_method="";
	$request_url="";
	
	$response_status="";
	$response_statusText="";
	
	$content_type="";
	$cache_control="";
	$pragma="";
	$expires="";
	$age="";
	$last_modified="";
	$host="";
	
	//entries(1)
	$startedDateTime =  $entries[$i]['startedDateTime']; 
	$timings_wait = $entries[$i]['timings']['wait'];
	$serverIPAddress = $entries[$i]['serverIPAddress'];
	
	$date10char = substr($startedDateTime,0,10);
	$day=date('l',strtotime($date10char));
	
	
	//$placeholder = "http://ipinfo.io/$serverIPAddress/json";
	//$placeholder = "http://ip-api.com/json/{$serverIPAddress}";
	$placeholder ="https://freegeoip.app/json/".$serverIPAddress; 
	$e_ip = file_get_contents($placeholder);
	$details = json_decode($e_ip, true);
	$lat=$details['latitude'];
	$lon=$details['longitude'];

	$sql_entries = "INSERT INTO entries  (username,startedDateTime,timings_wait,serverIPAddress,lat,lon,isp,day) VALUES('$username','$startedDateTime','$timings_wait','$serverIPAddress','$lat','$lon','$isp','$day')";
	if (!($con->query($sql_entries) === TRUE)) {
				echo "Error: " . $sql_entries . "<br>" . $con->error;
			}
			
	//requests(2)		
    $request_method =  $entries[$i]['request']['method']; 
	$request_url =  $entries[$i]['request']['url']; 
	$request_headers_length = count($entries[$i]['request']['headers']);				
					
					for($j = 0;$j<$request_headers_length;$j++){
						
						//echo($entries[$i]['request']['headers'][$j]['name']);		
						if ($entries[$i]['request']['headers'][$j]['name'] == "content-type" || $entries[$i]['request']['headers'][$j]['name'] == "Content-Type"||$entries[$i]['request']['headers'][$j]['name'] == "Content-type"|| $entries[$i]['request']['headers'][$j]['name'] == "content-Type" ){
							$content_type=$entries[$i]['request']['headers'][$j]['value'];								
						}
						if ($entries[$i]['request']['headers'][$j]['name']== "cache-control" || $entries[$i]['request']['headers'][$j]['name'] == "Cache-Control"|| $entries[$i]['request']['headers'][$j]['name'] == "Cache-control" || $entries[$i]['request']['headers'][$j]['name'] == "cache-Control"){
							$cache_control=$entries[$i]['request']['headers'][$j]['value'];							
						}
						if ($entries[$i]['request']['headers'][$j]['name'] == "pragma" || $entries[$i]['request']['headers'][$j]['name'] == "Pragma"){
							$pragma=$entries[$i]['request']['headers'][$j]['value'];							
						}
						if ($entries[$i]['request']['headers'][$j]['name'] == "expires"|| $entries[$i]['request']['headers'][$j]['name'] == "Expires"){
							$expires=$entries[$i]['request']['headers'][$j]['value'];							
						}
						if ($entries[$i]['request']['headers'][$j]['name'] == "age" ||$entries[$i]['request']['headers'][$j]['name'] == "Age"){
							$age=$entries[$i]['request']['headers'][$j]['value'];							
						}
						if ($entries[$i]['request']['headers'][$j]['name'] == "last-modified"||$entries[$i]['request']['headers'][$j]['name'] == "Last-Modified"|| $entries[$i]['request']['headers'][$j]['name'] == "Last-modified" || $entries[$i]['request']['headers'][$j]['name'] == "last-Modified"){
							$last_modified=$entries[$i]['request']['headers'][$j]['value'];							
						}
						if ($entries[$i]['request']['headers'][$j]['name'] == "host" || $entries[$i]['request']['headers'][$j]['name'] == "Host" ){
							$host=$entries[$i]['request']['headers'][$j]['value'];							
						}
						
					}
	$sql_requests = "INSERT INTO requests (username,method,url,content_type,cache_control,pragma,expires,age,last_modified,host) VALUES('$username','$request_method','$request_url','$content_type','$cache_control','$pragma','$expires','$age','$last_modified','$host')";					
	if (!($con->query($sql_requests) === TRUE)) {
		echo "Error: " . $sql_requests . "<br>" . $con->error;
	}
	
	
	//responses (3)
	$content_type="";
	$cache_control="";
	$pragma="";
	$expires="";
	$age="";
	$last_modified="";
	$host="";
	
	$response_status =  $entries[$i]['response']['status']; 
	$response_statusText =  $entries[$i]['response']['statusText']; 
	
			
			
	$response_headers_length = count($entries[$i]['response']['headers']);
					for($j = 0;$j<$response_headers_length;$j++){
						if ($entries[$i]['response']['headers'][$j]['name'] == "content-type" || $entries[$i]['response']['headers'][$j]['name'] == "Content-Type"||$entries[$i]['response']['headers'][$j]['name'] == "Content-type"|| $entries[$i]['response']['headers'][$j]['name'] == "content-Type" ){
							$content_type=$entries[$i]['response']['headers'][$j]['value'];							
						}
						if ($entries[$i]['response']['headers'][$j]['name']== "cache-control" || $entries[$i]['response']['headers'][$j]['name'] == "Cache-Control"|| $entries[$i]['response']['headers'][$j]['name'] == "Cache-control" || $entries[$i]['response']['headers'][$j]['name'] == "cache-Control"){
							$cache_control=$entries[$i]['response']['headers'][$j]['value'];							
						}
						if ($entries[$i]['response']['headers'][$j]['name'] == "pragma" || $entries[$i]['response']['headers'][$j]['name'] == "Pragma"){
							$pragma=$entries[$i]['response']['headers'][$j]['value'];							
						}
						if ($entries[$i]['response']['headers'][$j]['name'] == "expires"|| $entries[$i]['response']['headers'][$j]['name'] == "Expires"){
							$expires=$entries[$i]['response']['headers'][$j]['value'];							
						}
						if ($entries[$i]['response']['headers'][$j]['name'] == "age" ||$entries[$i]['response']['headers'][$j]['name'] == "Age"){
							$age=$entries[$i]['response']['headers'][$j]['value'];							
						}
						if ($entries[$i]['response']['headers'][$j]['name'] == "last-modified"||$entries[$i]['response']['headers'][$j]['name'] == "Last-Modified"|| $entries[$i]['response']['headers'][$j]['name'] == "Last-modified" || $entries[$i]['response']['headers'][$j]['name'] == "last-Modified"){
							$last_modified=$entries[$i]['response']['headers'][$j]['value'];							
						}
						if ($entries[$i]['response']['headers'][$j]['name'] == "host" || $entries[$i]['response']['headers'][$j]['name'] == "Host" ){
							$host=$entries[$i]['response']['headers'][$j]['value'];							
						}
					}
	$sql_responses = "INSERT INTO responses (username,status,statusText,content_type,cache_control,pragma,expires,age,last_modified,host) VALUES('$username','$response_status','$response_statusText','$content_type','$cache_control','$pragma','$expires','$age','$last_modified','$host')";
	if (!($con->query($sql_responses) === TRUE)) {
		echo "Error: " . $sql_responses . "<br>" . $con->error;
	}
				
  }		
			
	$sql_lu = "UPDATE  users SET last_upload='$today' WHERE username='$username'";
	if (!($con->query($sql_lu) === TRUE)) {
		echo "Error: " . $sql_lu . "<br>" . $con->error;
	}
				
?>

<body>
<h1>Το αρχείο .har ανέβηκε επιτυχώς.</h1>



</body>

</html>
