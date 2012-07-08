<?php 

	session_start();
  require_once("connection_open.php");
  require_once("EntryManagement.php");
	
if(!isset($_SESSION['email'])){
	{header('Location:login.php');}
}

$email = $_SESSION['email'];
$code = generateCode(20);

$check = checkIfAccountExist($email, $dbh);
if($check!=0){	
	header('Location:error.php?type=2&email='.$email);
}

$result = insertActivationCode($email, $code, $dbh);

/**
 * 
 * SEND ACTIVATION EMAIL
 * 
 * **/
?>
 
 
	<html>
<head>
<title>PHPMailer - SMTP (Gmail) basic test</title>
</head>
<body>

<?php

//error_reporting(E_ALL);

error_reporting(E_STRICT);

date_default_timezone_set('America/Toronto');

require_once('PHPMailer_v5.1/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$body             = "<br/>Please use the following information code to validate your account<br/><br/>Email id: <i>".$email."</i><br/><br/>Activation code:  ".$code."<br/> <br/> Regards, <br/> Webmaster";
$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "iitjalumni@gmail.com";  // GMAIL username
$mail->Password   = "vuifkpefcnuknqgn";            // GMAIL password

$mail->SetFrom('iitjalumni@gmail.com', 'IIT Rajasthan');

$mail->AddReplyTo("iitjalumni@gmail.com","IIT Rajasthan");

$mail->Subject    = "[ACTIVATION EMAIL]  IIT Rajasthan Alumni Portal";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = $email;
$mail->AddAddress($address, "John Doe");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  header('Location:activateAccount.php?email='.$email);
}

?>

</body>
</html>
	
  
  
  <?php
  
 /**
  * 
  * GENERATE RANDOM CODE
  * **/
 
 function generateCode($length = 10){
 $password="";
 $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
 srand((double)microtime()*1000000); 
 for ($i=0; $i<$length; $i++)
 {
	 $password .= substr ($chars, rand() % strlen($chars), 1); 
 } 
 return $password; 
} 
  ?>