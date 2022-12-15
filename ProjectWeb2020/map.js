$(document).ready(function(){
	var map = L.map('map').setView([38.250073844061426, 22.08082109372436],10);
	let tiles =  new L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
	map.addLayer(tiles);
	
	let cfg = {
		"radius": 40,
		"maxOpacity": 0.8,
		"scaleRadius": false,
		"useLocalExtrema": false,
		latField: 'lat',
		lngField: 'lon',
		valueField: 'count'
		};
	let heatmapLayer =  new HeatmapOverlay(cfg);

	map.addLayer(heatmapLayer);

	$.ajax({
        url:'db_download.php',
        type:'get',
        success:function(response){
		var heatmap_data = JSON.parse(response);
		let testData = {max: 10, data: heatmap_data};
					 //console.log(testData);
		heatmapLayer.setData(testData);
        }
					 

});
});