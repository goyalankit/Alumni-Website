<?php 

session_start();



  require_once("connection_open.php");
  require_once("EntryManagement.php");

if(!isset($_REQUEST['email'])){
	{header('Location:login.php');}
} else{
	$email = $_REQUEST['email'];
	
	$email = $email."@gmail.com";
	echo $email;
	
if(!isValidEmail($email)){
	header('Location:error.php?type=1&email='.$email);
}

else{
	$_SESSION['email']=$email;
	header('Location:sendActivationMail.php');
}

}


/** Validate Email Id
 * 
 *	First append @iit.ac.in to the address entered by user
 * 
 *  **/

function isValidEmail($email){ 
if(!filter_var($email,FILTER_VALIDATE_EMAIL)) 
{ 
echo("Your E-mail id is not valid");
return 0; 
} 
else 
{ 
echo("Your E-mail id is valid"); 
return 1;
} 
}
 /**

* Generate an activation code

* @param int $length is the length of the activation code to generate

* @return string

*/
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