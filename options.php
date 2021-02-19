<?php 
session_start();

if(!isset($_SESSION['ID'])){
	header('location:index.html');
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>

  	<div style="padding-right: 1.5rem;">

	<button class="btn" style="background-color: #333; width: 15%; float: right;" type="button" onclick="location.href='logout.php';">
						<i class="fas fa-power-off"></i>
					
				Logout</button>
	</div>
  	
	<img class="bg" src="img/bg3.png">
	<div class="options-container">
			<input type="submit" class="btn one" value="UPLOAD CERTIFICATE" onclick="location.href='upload.php';">
			<input type="submit" class="btn one" value="VIEW CERTIFICATE" onclick="location.href='view.php';">
	</div>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
