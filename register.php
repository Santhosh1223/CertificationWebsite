<?php

$host		= "10.113.17.3";      
$username	= "certify";
$password	= "certify"; 
$db_name	= "cert"; 
 
$con = mysqli_connect($host, $username, $password,$db_name);

$username =$_POST['EmailAdd'];
$password =md5($_POST['Password']);


//$query="INSERT INTO authentication (USERNAME,PASSWORD) VALUES('$username','$password')";

//$result=mysqli_query($con,$query);

 $query7="SELECT USERNAME FROM authentication WHERE USERNAME= '".$username."'";
                        $result7=mysqli_query($con,$query7);
                        if (mysqli_num_rows($result7) > 0) {
                
                                echo '<script>alert("Your Email Address is already registered!")</script>';
                                 echo "<script>location.href='index.html'</script>";
                        }
else{


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
		$mail->addAddress($username);
		//Set the subject line
		$mail->Subject = 'You are Successfully Registered to Get Certify';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		//$mail->msgHTML(file_get_contents('C:\xampp\htdocs\cert\PHPMailer\examples\contents.html'), dirname(__FILE__));
		//Replace the plain text body with one created manually
		$mail->Body = 'You are Successfully Registered to Get Certify';
		//Attach an image file
		//$mail->addAttachment('img/ava.svg');


		//send the message, check for errors
		if (!$mail->send()) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
			echo '<script>alert("Your Email Address is not valid!")</script>';
			echo "<script>location.href='index.html'</script>";	
		}
		else
		{
			$query="INSERT INTO authentication (USERNAME,PASSWORD) VALUES('$username','$password')";

			$result=mysqli_query($con,$query); 
		echo '<script>alert("You are Successfully Registered!. Please Login to continue.")</script>';
        	
		echo "<script>location.href='index.html'</script>";
		}
}


?>
