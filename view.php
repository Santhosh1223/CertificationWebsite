<?php

include 'connect.php';
session_start();

if(!isset($_SESSION['ID'])){
	header('location:index.html');
}

?>


<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/a81368914c.js"></script>
<style type="text/css">
	
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
#t01 tr:nth-child(even) {
  background-color: #eee;
}
#t01 tr:nth-child(odd) {
 background-color: #fff;
}
#t01 th {
  background-color: #fe7879 ;
  color: black;
}

</style>
<body style="background-color: #FFD95C;">
		<form><br><br><h2 style="padding-left: 550px; padding-top: 10px;color: #333; font-size: 40px;">Certification Record(s)</h2>
		</form>

		<div class="l" style="padding-right: 1.5rem; ">

	<button class="btn" style="background-color: #333; width: 15%; float: right;" type="button" onclick="location.href='logout.php';">
						<i class="fas fa-power-off"></i>
					
				Logout</button>
	</div>

      <div class="w3-card w3-yellow w3-white w3-hover-shadow" style=" padding: 20px; margin-left:5%;margin-right:5%; margin-top: 5%; border-radius: 25px;">
			<table id="t01" align="center" class="tt">
  			<tr>
    		<th>Employee Name &nbsp;</th>
    		<th>CSP</th>
    		<th>Certification Level</th>
    		<th>Certification Name</th>
    		<th>Certification ID</th>
    		<th>Date of certification</th>
    		<th>Expiry Date of Certification</th>
			<th>Validity</th>
		<th>Number of days left for expiry</th>
  		
	</tr>

  <?php

  $id=$_SESSION['ID'];
  $query4 = "SELECT * FROM certificationdetails WHERE ID = '".$id."'";
  $result4=mysqli_query($con,$query4);
        if(mysqli_num_rows($result4) > 0 )
        { 
            while($row4= mysqli_fetch_array($result4)){

				if($row4[2]==1){
					$cs="AWS";
				}
				else if($row4[2]==2){
					$cs="GCP";
				}
				else{
					$cs="Azure";
				}
				
				$date1=date_create($row4[6]);
				$d1=date_format($date1,"d-m-Y");
				$today = date('d-m-Y');
				$date2=date_create($row4[7]);
				$d2=date_format($date2,"d-m-Y");
				$diff = strtotime($today) - strtotime($d2); 
    				$nod=  abs(round($diff / 86400)); 
				echo "<tr>    
				<td>$row4[1]</td>
				<td>$cs</td>
				<td>$row4[3]</td>
				<td>$row4[4]</td>
				<td>$row4[5]</td>
				<td>$d1</td>
				<td>$d2</td>
				<td>$row4[8]</td>
				<td>$nod</td>
	
</tr>";
}
}
?>  
</table>

</div>
</body>
</html>
