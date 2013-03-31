<?php 
session_start();
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
		<div class="clsLogo"><a href="index.php"><img src="images/logo.png" alt="IIT Rajasthan Alumni Database"></img></a></div>
	
		<div id="weCreate">
			<div id="banner">
			<label style="font-size:50px;position:absolute;left:220px; color: #E8E8E8;"> ERROR </label><br/><br/><br/>
			<?php
			
			
			if(isset($_REQUEST['type'])){
			switch($_REQUEST['type']){				
				
				case 0:echo "<h2>Problem with server</h2>";
			echo "<b style='font-size:20px;'>There seems to be some problem with our server, please try after few minutes. If you still face problem please feel free to contact us.</b>";
					break;

				case 1:echo "<h2>Email id is Invalid.</h2>";
						echo "<b style='font-size:20px;'>Email id you enter is: </b><i style='font-size:20px;'>".$_REQUEST['email']."</i><br/>";
						echo "<b style='font-size:15px;'><ul><li> Please use email id provided to you by IIT Rajasthan </li></b>";
						echo "<b style='font-size:15px;'><li> Enter only username, DO NOT append @iitj.ac.in </li></b>";
						echo "<b style='font-size:15px;'><li><a href='login.php'> try again </a></li></b></ul>";
			
					break;
				
				case 2:echo "<h2>There already seems to be an account associated with this email id.</h2>";
						echo "<b style='font-size:20px;'>Email id you enter is: </b><i style='font-size:20px;'>".$_REQUEST['email']."</i><br/>";
						echo "<b style='font-size:20px;'>if you forgot your password <a href='#'> click here</a></b><i style='font-size:20px;'>".$_REQUEST['email']."</i><br/>";
						echo "<b style='font-size:15px;'><li><a href='login.php'> If you still have problem please fell free to contact us</a></li></b></ul>";
				
					break;
								
			}
			}
			
			?>			
			<div>
</div>

	</div>
</body>
</html>
