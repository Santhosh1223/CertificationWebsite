<?php
$host		= "10.113.17.3";      
$username	= "certify";
$password	= "certify"; 
$db_name	= "cert"; 

$con = mysqli_connect($host, $username, $password,$db_name);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //you need to exit the script, if there is an error
    exit();
}
else
{
}
?>
