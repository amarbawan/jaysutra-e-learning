<?php 

		include("inc/db.php");
		$query=$con->prepare("select *from contact where con_id='".$_COOKIE['userid']."'");
		
		$query->execute();
		$row=$query->fetch();
		

		// Import PHPMailer classes into the global namespace
		// These must be at the top of your script, not inside a function
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
		echo !extension_loaded('openssl')?"Not Available":"Available";
		//Load Composer's autoloader
		require 'vendor/autoload.php';

		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = false; // debugging: 1 = errors and messages, 2 = messages only
		$mail->Debugoutput = 'error_log';
		$mail->SMTPAuth = false; // authentication enabled
		$mail->SMTPAutoTLS = false; 
		$mail->SMTPSecure = 'none'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "localhost";
		$mail->Port = 25; // or 587
		$mail->IsHTML(true);
		$mail->Username = "helpdesk@jaysutra.com";
		$mail->Password = "Swati@bibu";
		$mail->SetFrom("helpdesk@jaysutra.com","JaySutra Education");
		$mail->Subject = "Payment Details JaySutra Education";
		$mail->Body = "Hi dear Student the account details of admin name - Swati Shilpi  and Bank Name : Karnataka Bank Ltd., Account Number - 1272500101520701, IFSC Code : KARB0000127  to transfer the amount of Rs. ".$_GET['amount']." . A copy of the transaction succesfull screenshot or  pdf sent to helpdesk@jaysutra.com and also submit in your profile section.You can also pay by clicking this link https://rzp.io/l/jaysutra ";
		
		$mail->AddAddress("".$row['email']."");

		 if(!$mail->Send()) {
			echo"Mailer Error: " . $mail->ErrorInfo;
		 } else {
			echo "Message has been sent,Check your email";
			
			echo"<script>alert('Details send to email successfully')</script>";
			echo"<script>window.open('delete_cart_after_buy.php','_self')</script>";
			
			
		 }
		 
	/*
else
{
		
		echo"<script>alert('!...email is Invalid...')</script>";
		echo"<script>window.open('index.php','_selt')</script>";
			
} */


?>