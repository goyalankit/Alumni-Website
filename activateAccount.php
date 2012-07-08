<?php 

	session_start();
  require_once("connection_open.php");
  require_once("EntryManagement.php");
	
//if(!isset($_SESSION['email'])){
	//{header('Location:login.php');}
//}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<link type="text/css" rel="stylesheet" href="style/general.css" />
	<title>Public Profile Page</title>
	<meta name="description" content="" />
<style type="text/css">

#weCreate {
	background: #474747 url(images/bg.png);
	margin: 70px;
	width:640px;
	height: 600px;
	position:absolute;
	top:-70px;
	left:200px;
	z-index: -1;
}
pre {
	width: 70px; margin: 0 auto; background: #222; padding: 20px;
	font-size: 22px; color: #555; text-shadow: 0px 2px 3px #171717;
	display:inline;
	-webkit-box-shadow: 0px 2px 3px #555;
	-moz-box-shadow: 0px 2px 3px #555;
	-webkit-border-radius: 10px;
	-moz-border-radius: 12px;
	
}


h1 {
	display: block; text-decoration: none;
	font: 18px Helvetica, Arial, Sans-Serif; letter-spacing: .5px;  
	text-align: center;
	color: #999; text-shadow: 0px 3px 8px #2a2a2a;
 }
 	
 h2 {
	font: 40px Tahoma, Helvetica, Arial, Sans-Serif;
	text-align: center;
	position:relative;
	color: #222; text-shadow: 0px 2px 3px #555;
}
#div_Regsiter{
	position:absolute;
	left:170px;
}
#div_login{
	position:absolute;
	left:150px;
}
</style>

</head>

<body>
	<div class="clsPageAlign">
		<div class="clsLogo"><a href="ind.php"><img src="images/logo.png" alt="IIT Rajasthan Alumni Database"></img></a></div>
	
		<div id="weCreate">			
			<h2> Activation</h2>
			<?php if(isset($_REQUEST['error'])){if($_REQUEST['error']=='1'){echo '<div class="error" style="border: solid red; padding: 22px; margin:3px;"> Activation code mismatch. Please check code and email id.</div>';}} ?>
			<div id="div_login" style="border: solid; padding: 22px; margin:3px;">	
    	   		<form action="#" enctype="multipart/form-data" method="post">               
        		<b>Email id:</b> <input id="username" type="text" name="email" style="margin:5px" value="<?php if(isset($_REQUEST['email'])) echo $_REQUEST['email'];?>"/><br/> 
        		<b style="margin-right: 15px; margin-bottom:  10px;">Code :</b> <input id="pass" type="password" name="code" style="margin:5px; margin-bottom: 20px; "/><br/>           
         		<button id="submit" style="position: relative; left: 80px;" name="validate">Validate</button>    
    		</form>
   </div><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/>
		 	<br/><h1 style="position:relative;"> if you have trouble registering please contact: <a href="mailto:alumni@iitj.ac.in">alumni@iitj.ac.in</a></h1>
</div>

	</div>
</body>
</html>
<?php
if(isset($_REQUEST['validate'])){
	$code = $_REQUEST['code'];
	$email = $_REQUEST['email'];
	$result = matchActivationCode($code, $email, $dbh);
	
	if($result!=1){
		header('Location:activateAccount.php?error=1&email='.$email.'&result='.$result);
	}
	else{header('Location:NewUser.html');}	
}

?>