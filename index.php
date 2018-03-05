<?php 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<script type="text/javascript">
			function ajax() {
				var username = document.getElementById('username').value;
				var userpass = document.getElementById('password').value;
				// Consola
				console.log(username);
				console.log(userpass);
				// Instanciar el objeto XMLHttpRequest
				connection = new XMLHttpRequest();
				// Preparar respuesta
				connection.onreadystatechange = response;
				// Petición HTTP con POST
				connection.open('GET', 'http://localhost/MusicFinal/public/index.php/users/login.json?username=' + username + '&password=' + userpass);
			
				
				connection.send();
			}
			function response(){
				if (connection.readyState == 4) {
					var response = JSON.parse(connection.responseText);
					if (response.code == 200){
					location.href ="http://localhost/ClienteMusicFinal/songs.php";
				
					} else if (response.code == 400 || response.code == 500 ){
					document.getElementById('code').innerHTML = response.code;
					document.getElementById('message').innerHTML = response.message;
					document.getElementById('data').innerHTML = response.data;
					document.getElementById('user').innerHTML = response.data.username;
					}
				}
			}
		</script>
		<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">			
		
	

		<style>
			body{
				margin-left: 10px;
			}
			.form-control{
				width: 200px;
				margin-bottom: 10px;
			}
		</style>
	</head>
	<body>

		<h1>Login</h1>
		<div id='response'>
			<p id='code'></p>
			<p id='message'></p>
			<p id='data'></p>
			<p id='user'></p>
		</div>

	
		
		<input type="text" class="form-control" id="username" placeholder="Username">
		<input type="password" class="form-control" id="password" placeholder="Password">
		<button onclick='ajax()' class="btn btn-primary active"">Enviar</button>
	
		

	</body>
</html>