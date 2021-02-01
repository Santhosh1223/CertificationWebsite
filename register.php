<?php

$host		= "localhost";      
$username	= "root";
$password	= ""; 
$db_name	= "cert"; 
 
$con = mysqli_connect($host, $username, $password,$db_name);

$username =$_POST['Username'];
$password =md5($_POST['Password']);


$query="INSERT INTO authentication (USERNAME,PASSWORD) VALUES('$username','$password')";

$result=mysqli_query($con,$query);

if($result){
	echo "uploaded";
}

?>
