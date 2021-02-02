<?php
 
include 'connect.php';
session_start();

if(!isset($_SESSION['ID'])){
	header('location:index.html');
}
else{

	

	$empid=$_SESSION['ID'];
	$empname =$_POST['EmpName'];
	$csp =$_POST['CSP'];
	$certlevel =$_POST['CertLevel'];
	$certname =$_POST['CertName'];
	$certid =$_POST['CertID'];
	$datecert =$_POST['DateCert'];
	$certexp =$_POST['CertExp'];
	$validity =$_POST['Validity'];
	
	$query3="INSERT INTO certificationdetails (ID,EmployeeName,CSP,CertificationLevel,CertificationName,CertificationID,CertificationDate,CertificationExpDate,Validity) VALUES('$empid','$empname','$csp','$certlevel','$certname','$certid','$datecert','$certexp','$validity')";
	$result3=mysqli_query($con,$query3);
	if($result3){
	echo "uploaded";



	echo "$empname";
	echo "$csp";
	echo "$certlevel";
	echo "$certname";
	echo "$certid";
	echo "$datecert";
	echo "$certexp ";
	echo "$validity";
}

	}
?>
