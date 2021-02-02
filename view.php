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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  background-color: black;
  color: white;
}
</style>
<body>
	<div class="w3-content">

      <div class="w3-card w3-white w3-hover-shadow w3-padding" style="margin-left: %;margin-right: %; margin-top: 10%;">
      <br>
      <br>
<table id="t01" align="center">
  <tr>
    <th>Employee Name &nbsp;</th>
    <th>CSP</th>
    <th>Certification Level</th>
    <th>Certification Name</th>
    <th>Certification ID</th>
    <th>Date of certification</th>
    <th>Expiry Date of Certification</th>
	<th>Validity</th>
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
				echo "<tr>    
				<td>$row4[1]</td>
				<td>$cs</td>
				<td>$row4[3]</td>
				<td>$row4[4]</td>
				<td>$row4[5]</td>
				<td>$row4[6]</td>
				<td>$row4[7]</td>
				<td>$row4[8]</td>
				</tr>";
			}

        }


  ?>







</table>
</div>
</div>
</body>
</html>