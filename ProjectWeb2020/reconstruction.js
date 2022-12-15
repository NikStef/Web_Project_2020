document.getElementById('flt').onclick = function() {
	var file = document.getElementById('haris').files;

$.getJSON('https://ipapi.co/json/', function(data) {
  //console.log(JSON.stringify(data, null, 2));
  document.getElementById("db_upload").elements["ip"].value = data['ip'];
  //document.getElementById("db_upload").elements["city"].value = data['city'];
  document.getElementById("db_upload").elements["org"].value = data['org'];
});


	
	if (file.length <= 0) {
		console.log("keno arxeio");
		return false;
	}
	
	
	var fr = new FileReader();
	
	
		fr.onload = function(e) { 
			//console.log(10);
			var result = JSON.parse(e.target.result);
			
			var placeholder;
			var replaced;
			
			var recon = "{\"entries\":[ ";
			var oghar = result['log']['entries'];
			for(var i=0;i<oghar.length;i++){
				
				recon = recon + "{" +"\"startedDateTime\":" + "\"" + oghar[i]['startedDateTime']+ "\"" + "," ;
				
				recon = recon + "\"serverIPAddress\":" + "\"" + oghar[i]['serverIPAddress']+ "\"" + ","  ;
				
				recon = recon + "\"timings\":{\"wait\":" + "\"" + oghar[i]['timings']['wait']+ "\"" + "},";
				
				recon = recon +  "\"request\": { \"method\": " + "\"" + oghar[i]['request']['method']+ "\"" + ","; 
				var urlname =  oghar[i]['request']['url'];
				var domain = ( new URL(urlname)).hostname.replace('www.',''); 
				 
				recon = recon + "\"url\":"+ "\"" + domain + "\","; 
				
				recon = recon + "\"headers\":[";
				var headersq = oghar[i]['request']['headers'];
				var comma = 0;
					for(var j = 0;j<headersq.length;j++){
						//console.log(headersq[j]['name']);						
						if (headersq[j]['name'] == 'content-type' || headersq[j]['name'] == 'Content-Type'||headersq[j]['name'] == 'Content-type'|| headersq[j]['name'] == 'content-Type' ){
							if (comma!=0){recon = recon + ",";}
							
							placeholder = headersq[j]['value'];
							replaced = placeholder.replace(/"/g, "");//global για να τα διαγράψει όλα.
							//replaced = prereplaced.replace(/;/g, "");
							
							recon = recon + "{\"name\":\"content-type\",\"value\":\""+ replaced + "\"}";
							comma=comma+1;
						}
						if (headersq[j]['name'] == 'cache-control' || headersq[j]['name'] == 'Cache-Control'|| headersq[j]['name'] == 'Cache-control' || headersq[j]['name'] == 'cache-Control'){
							if (comma!=0){recon = recon + ",";}
							recon = recon + "{\"name\":\"cache-control\",\"value\":\""+ headersq[j]['value']+ "\"}";
							comma=comma+1;
						}
						if (headersq[j]['name'] == 'pragma' || headersq[j]['name'] == 'Pragma'){
							if (comma!=0){recon = recon + ",";}
							recon = recon + "{\"name\":\"pragma\",\"value\":\""+ headersq[j]['value']+ "\"}";
							comma=comma+1;
						}
						if (headersq[j]['name'] == 'expires'|| headersq[j]['name'] == 'Expires'){
							if (comma!=0){recon = recon + ",";}
							recon = recon + "{\"name\":\"expires\",\"value\":\""+ headersq[j]['value']+ "\"}";	
							comma=comma+1;
						}
						if (headersq[j]['name'] == 'age' ||headersq[j]['name'] == 'Age'){
							if (comma!=0){recon = recon + ",";}
							recon = recon + "{\"name\":\"age\",\"value\":\""+ headersq[j]['value']+ "\"}";
							comma=comma+1;
						}
						if (headersq[j]['name'] == 'last-modified'||headersq[j]['name'] == 'Last-Modified'|| headersq[j]['name'] == 'Last-modified' || headersq[j]['name'] == 'last-Modified'){
							if (comma!=0){recon = recon + ",";}
							recon = recon + "{\"name\":\"last-modified\",\"value\":\""+ headersq[j]['value']+ "\"}";	
							comma=comma+1;
						}
						if (headersq[j]['name'] == 'host' || headersq[j]['name'] == 'Host' ){
							if (comma!=0){recon = recon + ",";}
							recon = recon + "{\"name\":\"host\",\"value\":\""+ headersq[j]['value']+ "\"}";	
							comma=comma+1;
						}
					}
				recon = recon + "]},";
				
				recon = recon +  "\"response\": { \"status\": " + "\"" + oghar[i]['response']['status']+ "\"" + ","; 
				recon = recon + "\"statusText\":"+ "\"" + oghar[i]['response']['statusText'] + "\","; 
				recon = recon + "\"headers\":[";
				var headersp = oghar[i]['response']['headers'];
				var comma = 0;
					for(var j = 0;j<headersp.length;j++){
						//console.log(headersp[j]['name']);						
						if (headersp[j]['name'] == 'content-type' || headersp[j]['name'] == 'Content-Type'||headersp[j]['name'] == 'Content-type'|| headersp[j]['name'] == 'content-Type' ){
							if (comma!=0){recon = recon + ",";}
							
							placeholder = headersp[j]['value'];
							replaced = placeholder.replace(/"/g, "");//global για να τα διαγράψει όλα.
							//replaced = prereplaced.replace(/;/g, "");
							
							recon = recon + "{\"name\": \"content-type\",\"value\":\""+ replaced + "\"}";
							comma=comma+1;
						}
						if (headersp[j]['name'] == 'cache-control' || headersp[j]['name'] == 'Cache-Control'|| headersp[j]['name'] == 'Cache-control' || headersp[j]['name'] == 'cache-Control'){
							if (comma!=0){recon = recon + ",";}
							recon = recon + "{\"name\":\"cache-control\",\"value\":\""+ headersp[j]['value']+ "\"}";
							comma=comma+1;
						}
						if (headersp[j]['name'] == 'pragma' || headersp[j]['name'] == 'Pragma'){
							if (comma!=0){recon = recon + ",";}
							recon = recon + "{\"name\":\"pragma\",\"value\":\""+ headersp[j]['value']+ "\"}";
							comma=comma+1;
						}
						if (headersp[j]['name'] == 'expires'|| headersp[j]['name'] == 'Expires'){
							if (comma!=0){recon = recon + ",";}
							recon = recon + "{\"name\":\"expires\",\"value\":\""+ headersp[j]['value']+ "\"}";	
							comma=comma+1;
						}
						if (headersp[j]['name'] == 'age' ||headersp[j]['name'] == 'Age'){
							if (comma!=0){recon = recon + ",";}
							recon = recon + "{\"name\":\"age\",\"value\":\""+ headersp[j]['value']+ "\"}";
							comma=comma+1;
						}
						if (headersp[j]['name'] == 'last-modified'||headersp[j]['name'] == 'Last-Modified'|| headersp[j]['name'] == 'Last-modified' || headersp[j]['name'] == 'last-Modified'){
							if (comma!=0){recon = recon + ",";}
							recon = recon + "{\"name\":\"last-modified\",\"value\":\""+ headersp[j]['value']+ "\"}";	
							comma=comma+1;
						}
						if (headersp[j]['name'] == 'host' || headersp[j]['name'] == 'Host' ){
							if (comma!=0){recon = recon + ",";}
							recon = recon + "{\"name\":\"host\",\"value\":\""+ headersp[j]['value']+ "\"}";	
							comma=comma+1;
						}
					}
				recon = recon + "]}}";
				if(i!=oghar.length-1){recon = recon + ",";}
			}
			recon = recon +  "]}";
			
			document.getElementById("save_har").elements["reconstructed1"].value = recon;
			document.getElementById("db_upload").elements["reconstructed2"].value = recon;
		}


	//https://jsonlint.com/
	
	
	
}
