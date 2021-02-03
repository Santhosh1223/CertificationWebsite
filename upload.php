<?php
 
session_start();

include 'connect.php';
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
	

	<img class="upldicon" src="img/upld.svg">

	<div class="l" style="padding-right: 1.5rem; ">

	<button class="btn" style="background-color: #333; width: 15%; float: right;" type="button" onclick="location.href='logout.php';">
						<i class="fas fa-power-off"></i>
					
				Logout</button>
	</div>

	<div class="container">

		<div class="upload-container">

			<form action="register.php" method="post">




				
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div>
						<input class="input" type="text" placeholder="Employee Name" name="EmpName" required>
					</div>
				</div>
				<div class="input-div two">
					<div class="i">
						<i class="fas fa-cloud"></i>
					</div>
					<div>
						<select class="input"  id="CSP" name="CSP">
							<option value="" >Cloud Service Provider</option>
  							<option value="1">AWS</option>
  							<option value="2">GCP</option>
  							<option value="3">Azure</option></select>
					</div>
				</div>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-layer-group"></i>
					</div>
					<div>
						<input class="input" type="text" placeholder="Certification Level" name="CertLevel" required>
					</div>
				</div>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-certificate"></i>
					</div>
					<div>
						<input class="input" type="text" placeholder="Certification Name" name="CertName" required>
					</div>
				</div>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-id-card"></i>
					</div>
					<div>
						<input class="input" type="text" pattern="[a-zA-Z0-9]+" placeholder="Certification ID" name="CertID" required>
					</div>
				</div>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-calendar-alt"></i>
					</div>
					<div>
						<input placeholder="Date of Certification" class="input" max="<?php echo date("Y-m-d"); ?>" type="text" name="DateCert" onfocus="(this.type='date')" id="CertDate">
					</div>
				</div>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-calendar-alt"></i>
					</div>
					<div>
						<input placeholder="Expiry Date of certification" min="<?php echo date("Y-m-d"); ?>" class="input" type="text" name="CertExp" onfocus="(this.type='date')" id="ExpiryDate">
					</div>
				</div>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-clock"></i>
					</div>
					<div>
						<input class="input" type="text" pattern="[0-9]+" placeholder="Validity(yrs)" name="Validity" required>
					</div>
				</div>
				<!-- 
					<input type="submit" class="btn" value="LOGIN" formaction="options.html"> -->
				<div class="upldbtn">
				<input type="submit" class="btn two" value="UPLOAD" formaction="certdetails.php"></div>	
			</form>
		</div>	
	</div>
	<script type="text/javascript" src="js/main.js"></script>

</body>
</html>