<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet"href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"/>

<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/heatmapjs@2.0.2/heatmap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet-heatmap@1.0.0/leaflet-heatmap.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src = "map.js"> </script>

<style>

#map{position:absolute;
	top:40px;
	bottomo:0;
	left:250px;
	right:0;
	width: 80%; 
	height: 80%
}
</style>




</head>
<body>
<?php include 'u_mapico.php';?>
<div id = "map" ></div>

 


</body>
</html>






