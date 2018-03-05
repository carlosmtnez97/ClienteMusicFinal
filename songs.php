<!DOCTYPE html>
<html>
	<head>
		<title>Canciones</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">			
		
	
		<script type="text/javascript">
			function showUsers(){
				var songs = new XMLHttpRequest();
				songs.open('GET', 'http://localhost/MusicFinal/public/index.php/songs/songs.json');
				songs.send();
				songs.onreadystatechange = function() {
    				if(songs.readyState == 4){
        				console.log("connection  == 4 ");
        				var response = JSON.parse(songs.responseText);
						console.log(response);
						response.forEach(function(a){
							console.log("Element " + a["title"]);
							
							document.getElementById('songList').innerHTML += "<li>"+ a["title"] +"</li>";
							
						});
    				}	
				}
			}
			
			function GoCreateSongs(){
				window.location.href = "http://localhost/ClienteMusicFinal/createSongs.php";
			}	
			
			showUsers();
		</script>
	
		<style>
			body{
				margin-left: 10px;
			}
			p{
				width: 200px;
				margin-bottom: 10px;
			}
			button{
				margin-top: 10px;
			}
		</style>
	</head>
	<body>

		<h1>Lista canciones</h1>

		

		<div id="songList">

		
			
		</div>
		

		<button type="button" class="btn btn-primary " onclick="GoCreateSongs()">Create song</button>
		
	

		
	</body>
</html>