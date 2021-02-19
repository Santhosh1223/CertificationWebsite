<?php 
include 'connect.php';
session_start();
$smail=$_SESSION['Email'];


if(!isset($_SESSION['ID'])){
	header('location:index.html');
}
else{
/*
require_once 'vendor/fupload/autoload.php';

use Google\Cloud\Storage\StorageClient;

// Please use your own private key (JSON file content) which was downloaded in step 3 and copy it here
// your private key JSON structure should be similar like dummy value below.
// WARNING: this is only for QUICK TESTING to verify whether private key is valid (working) or not.  
// NOTE: to create private key JSON file: https://console.cloud.google.com/apis/credentials  
$privateKeyFileContent = '{
  "type": "service_account",
  "project_id": "certificate-project-303705",
  "private_key_id": "940375cd30224967d8fd6269ea1b5a30d3e0c124",
  "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDkN5Tsv6JE5g5f\ngQ02pGZvEsChtl5eCkYu3GrHPPQNmHe2i6Ylksj8nqEuhDHe7fV5IQAl/VqbyYlt\nuec4ZIP5zG+1ltKbo7Phnw8hMWtRs/PAdn2VRWcJ4BemLArqlmP51eiu/A7Ziwo5\n19iM8I0paB1O7IlUYly5pAM3UBFXa1fIqjuq1w0iRpun/aCliGK+/xIipQwYIlDC\nWvb55wzRFvOmzZsGMZNk8tnrCax8o7nDYwImSn0eilrkyANd75hWtVH/kDwpFhMT\npeFal90feICSltOp4LrIkVQJkMyyNz5TzIqQdkdgVOQpDKWsllz/k519QlB5mzfI\nYYqURad5AgMBAAECggEAA1d3gihzsDHUrcwSVRWe7Nsv0CZfFx4sJSlD1H9FXRIZ\nlaYRlJ0DvaQ2fLuBje+6z49exM+jBSM0NJO7aaFaJ90ZGSX4V0BURNZbBrvGJCQA\nCpZJlDcYEUZTXlLohYMWe2zpC2/kKUYOjCaHlJe8n2m3fSV8RMysaij3RZbx7A9e\nnVRQTevxyyNr5tZwbOx/OtGhdvrDLYKqjLNIlBgV9nCPj7SigaOycKvwyQZ7ulwX\nIt2hAOIikhBnfTZ5yHqSa2P5USJXKQQJCf7nYUmcAI6BZfCP95NBCtn/+Nbe9sir\nKSywgB0ZZnQXNfXYb9D4otorPgq957F/4yuKJXpfcQKBgQD0iJqyv7FvsR5CYezc\n+LhIr3og4/eAJnCf45E+6S0Jn58GlMDax/E3FNpx3z3NX4LO31gssjVJIzzflToW\nYucDXJbrmWtdyozuMEjwPd48cER43EgknSrV5rHX97T0+2nwEkh/bZccQT61LBrd\n7K94pstfBriyBbklxBOL7RjhSQKBgQDu6x0BItXtLzU1sND4IdAHCR7kvm8Ujt0g\nDJ31/SRONzsrML4p6UwcUqlXWUFIfy6XNAC7PWyuz1NWIbZoxkBlxMJ5tgiDLAfP\n8lnOnUc0qiHvYkj5G8pv+aM90letQZZmI/G00ljYeZ/cNXOXfNVl2C8Xn/3HSTEc\n8UiKoubEsQKBgQDLt7pZTAXAbSguWXKBLNwqAbaXDBQ3OM7/BREN/ig9KjPLwcVg\n/s1f/Al4cGkGXZmWSs8kfVqTEb427hU0bTTTwiEhKfEedA4wqR06t/AbHdSNc8bO\nafkztjtXFtA0f/djv3eSYXRQX7KkMJg5ZmNQ+nPXOLxJ4ya55b37Bo2BsQKBgFST\nppDgZBqyu4NmNJOiZKIY+HbBc1EzwdO2o7SRCGkn5CpF9wufKvJb0Na7IgEoBLZC\nEoA2HmNDwZycEpbEl8du/+lWJ21ICPv0LxaVVr+t+pVjlbGZxPAez0rzS1ZqAXPn\nBYmdbRY0+AJcaa8W4fRLs2AJoy0JG/nC8IsjX84BAoGAYLsuve3mw84s+ybmV09c\nR9E6fSUoXbbCxn77zO3pB3foJffFBv278c+vvYzmJmpf0FxNVjs7/XFU6RjoxHQc\nZ5dEiOJtQ3Gv89bwV7g0i3FNF+tEJMGT7rP3HVMAoVNJ/bluCIGdg7UvLnQ9JiCi\nUOp9pYxWtnviOwrt5riC2h4=\n-----END PRIVATE KEY-----\n",
  "client_email": "gcp-storage-upload@certificate-project-303705.iam.gserviceaccount.com",
  "client_id": "113159614740399784358",
  "auth_uri": "https://accounts.google.com/o/oauth2/auth",
  "token_uri": "https://oauth2.googleapis.com/token",
  "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
  "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/gcp-storage-upload%40certificate-project-303705.iam.gserviceaccount.com"
}';
*/
	$empid=$_SESSION['ID'];
	$empname =$_POST['EmpName'];
	$csp =$_POST['CSP'];
	$certlevel =$_POST['CertLevel'];
	$certname =$_POST['CertName'];
	$certid =$_POST['CertID'];
	$datecert =$_POST['DateCert'];
	$certexp =$_POST['CertExp'];
	$validity =$_POST['Validity'];
	$today = date('d-m-Y');
	$diff = strtotime($today) - strtotime($certexp); 
        $nod=  abs(round($diff / 86400)); 
	$query6="SELECT CertificationID FROM certificationdetails WHERE CertificationID= '".$certid."'";
	$result6=mysqli_query($con,$query6);
	if (mysqli_num_rows($result6) > 0) {
		
			echo '<script>alert("Certification ID already exists!")</script>';
            echo "<script>location.href='upload.php'</script>";
	}

	$query3="INSERT INTO certificationdetails (ID,EmployeeName,CSP,CertificationLevel,CertificationName,CertificationID,CertificationDate,CertificationExpDate,Validity) VALUES('$empid','$empname','$csp','$certlevel','$certname','$certid','$datecert','$certexp','$validity')";
	$result3=mysqli_query($con,$query3);
	
        
/*	$response['code'] = "200";
	if ($_FILES['file']['error'] != 4) {
        //set which bucket to work in
        $bucketName = "certdocs_bucket";
        // get local file for upload testing
        $fileContent = file_get_contents($_FILES["file"]["tmp_name"]);
        // NOTE: if 'folder' or 'tree' is not exist then it will be automatically created !
        $cloudPath = 'uploads/' . $_FILES["file"]["name"];
 
        $isSucceed = uploadFile($bucketName, $fileContent, $cloudPath);
 
        if ($isSucceed == true) {
            $response['msg'] = 'SUCCESS: to upload ' . $cloudPath . PHP_EOL;
            // TEST: get object detail (filesize, contentType, updated [date], etc.)
            $response['data'] = getFileInfo($bucketName, $cloudPath);
        } else {
            $response['code'] = "201";
            $response['msg'] = 'FAILED: to upload ' . $cloudPath . PHP_EOL;
        }

  */      
	if($result3){
	

		//SMTP needs accurate times, and the PHP time zone MUST be set
		//This should be done in your php.ini, but this is how to do it if you don't have access to that
		date_default_timezone_set('Etc/UTC');

		require 'PHPMailer/PHPMailerAutoload.php';

		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 2;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = "ssl://smtp.gmail.com";
		//Set the SMTP port number - likely to be 25, 465 or 587
		$mail->Port = 465;
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication
		$mail->Username = "certadder@gmail.com";
		//Password to use for SMTP authentication
		$mail->Password = "certadder@123";
		//Set who the message is to be sent from
		$mail->setFrom('certadder@gmail.com', 'Get Certify');
		////Set an alternative reply-to address
		//$mail->addReplyTo('replyto@example.com', 'First Last');
		//Set who the message is to be sent to
		$mail->addAddress($smail);
		//Set the subject line
		if($nod<10){
		$mail->Subject = 'Certificate Expiry';
                //Read an HTML message body from an external file, convert referenced images to embedded,
                //convert HTML into a basic plain-text alternative body
                //$mail->msgHTML(file_get_contents('C:\xampp\htdocs\cert\PHPMailer\examples\contents.html'), dirname(__FILE__));
                //Replace the plain text body with one created manually
                $mail->Body = 'Your Certificate is about to get expired soon!';
                //Attach an image file
                //$mail->addAttachment('images/phpmailer_mini.png');
		}
		else{
		$mail->Subject = 'Certificate Uploaded Succesfully';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		//$mail->msgHTML(file_get_contents('C:\xampp\htdocs\cert\PHPMailer\examples\contents.html'), dirname(__FILE__));
		//Replace the plain text body with one created manually
		$mail->Body = 'Your Certificate details are uploaded succesfully';
		//Attach an image file
		//$mail->addAttachment('images/phpmailer_mini.png');
		}
		//send the message, check for errors
		if (!$mail->send()) {
		 //   echo "Mailer Error: " . $mail->ErrorInfo;
		echo '<script>alert("Mail not sent. Try again later")</script>';
		echo "<script>location.href='upload.php'</script>";
		}
	        echo "<script>location.href='options.php'</script>";
	

}
else
{
	echo '<script>alert("There seems to be some problem. Please try again")</script>';
	echo "<script>location.href='upload.php'</script>";
}
/*if($nod<10){
date_default_timezone_set('Etc/UTC');
require 'PHPMailer/PHPMailerAutoload.php';

                //Create a new PHPMailer instance
                $mail = new PHPMailer;
                //Tell PHPMailer to use SMTP
                $mail->isSMTP();
                //Enable SMTP debugging
                // 0 = off (for production use)
                // 1 = client messages
                // 2 = client and server messages
                $mail->SMTPDebug = 2;
                //Ask for HTML-friendly debug output
                $mail->Debugoutput = 'html';
                //Set the hostname of the mail server
                $mail->Host = "ssl://smtp.gmail.com";
                //Set the SMTP port number - likely to be 25, 465 or 587
                $mail->Port = 465;
                //Whether to use SMTP authentication
                $mail->SMTPAuth = true;
                //Username to use for SMTP authentication
                $mail->Username = "certadder@gmail.com";
                //Password to use for SMTP authentication
                $mail->Password = "certadder@123";
                //Set who the message is to be sent from
                $mail->setFrom('certadder@gmail.com', 'Get Certify');
                ////Set an alternative reply-to address
                //$mail->addReplyTo('replyto@example.com', 'First Last');
                //Set who the message is to be sent to
                $mail->addAddress($smail);
                //Set the subject line
                $mail->Subject = 'Your certificate is about to get expired soon';
                //Read an HTML message body from an external file, convert referenced images to embedded,
                //convert HTML into a basic plain-text alternative body
                //$mail->msgHTML(file_get_contents('C:\xampp\htdocs\cert\PHPMailer\examples\contents.html'), dirname(__FILE__));
                //Replace the plain text body with one created manually
                $mail->Body = 'Your Certificate is about to get expired soon';
                //Attach an image file
                //$mail->addAttachment('images/phpmailer_mini.png');

}
*/
}
?>
