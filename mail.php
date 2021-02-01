<?php


$to_email="santhosh.venkat1223@gmail.com";
$subject="registered";
$body="hi,successfully signed up";
$headers="From: certadder@gmail.com";

if(mail($to_email,$subject,$body,$headers)){
	echo "Email successfully sent...";
}
else{
	echo "Email sending failed..";
}


?>
