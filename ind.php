<?php
session_start();

require_once("connection_open.php");
require_once("EntryManagement.php");
 
 $logged = 'n';
if(!isset($_SESSION['username'])){
 $logged = 'n';
}
else{
	$details=getProfileInformation($_SESSION['username'], $dbh);	  
	$logged = 'y';
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 



<html>



<head>




<script src="script/mootools-1.3.1-core.js"></script>
	<script src="script/mootools-1.3.1.1-more.js"></script>
	<script src="script/slideshow.js"></script>

	<link type="text/css" rel="stylesheet" href="style/general.css" /> 
<link type="text/css" rel="stylesheet" href="style/rocket.css" />


<style type="text/css">

* { margin, padding: 0; }

#slog{
	
	position: absolute;
	left:80px;
	display:inline;
}
#nlog{
	position: absolute;
	left:465px;
	display:inline;
}

#slog a {text-decoration:none;
	font-size: 22px; color: #555; text-shadow: 0px 2px 3px #171717;
	}
#blink1, #blink2, #blink3 {
text-decoration:none;
}

#blink1:hover #sbox{ 
	background:#FF0000;
}
#blink2:hover #slog{ 
	background:#FFFF99;
}
#blink3:hover #nlog{ 
	background:#99FFFF;
}
#sbox{
	text-decoration:none;
	position: absolute;
	left:270px;
	display:inline;
}

#weCreate {
	background: #474747 url(images/bg.png);
	margin: 70px;
	width:640px;
	height: 500px;
	position:relative;
	top:-120px;
	left:200px;
	z-index:4;
}
pre {
	width: 70px; margin: 0 auto; background: #222; padding: 20px;
	font-size: 18px; color: #555; text-shadow: 0px 2px 3px #171717;
	display:inline;
	-webkit-box-shadow: 0px 2px 3px #555;
	-moz-box-shadow: 0px 2px 3px #555;
	-webkit-border-radius: 10px;
	-moz-border-radius: 12px;
	
}


h1 {
	display: block; text-decoration: none;
	font: 50px Helvetica, Arial, Sans-Serif; letter-spacing: .5px;  
	text-align: center;
	color: #999; text-shadow: 0px 3px 8px #2a2a2a;
 }
 	h1 a:hover {
 		color: #a0a0a0; text-shadow: 0px 5px 8px #2a2a2a;
 	}
 
 h2 {
 	
	font: 40px Tahoma, Helvetica, Arial, Sans-Serif;
	text-align: center;
	
	color: #222; text-shadow: 0px 2px 3px #555;
}

#share {
        color: #fff;
        text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #fff, 0 0 20px rgb(154,0,0), 0 0 30px rgb(154,0,0), 0 0 40px rgb(154,0,0), 0 0 50px rgb(154,0,0), 0 0 75px rgb(154,0,0);
        letter-spacing: 5px;
        text-align: center;
        font: 40px 'MisoRegular';
}

#sidetext{

        color: #d7ceb2;
        text-shadow: 3px 3px 0px #2c2e38, 5px 5px 0px #5c5f72;
        font: 80px 'BazarMedium';
        letter-spacing: 10px;
}
/*
#share{
	
	font: 40px Tahoma, Helvetica, Arial, Sans-Serif;
	text-align: center;
	
	color: #E8E8E8; text-shadow: 0px 2px 3px #555;
}
*/

<style type="text/css">

#addim{
	display: block;
	float:left;
	position:absolute;
	left:370px;
	font-size: 12px;	
}
#adminim{
	display: block;
	float:left;
	position:absolute;
	left:570px;
	font-size: 12px;
	color:#000000;	
}
#infoim
{
	display: block;
	float:left;
	position:absolute;
	left:770px;
	font-size: 12px;
	color:#000000;	
}

#sidebar{
	position:relative;
	left: 15px;
width: 240px;
float:left;
height: 870px;
top: -20px;
background-color:rgb(154,0,0);
	z-index: 100;
}

hr{
	color: white;	
	
}


</style>




<link rel="stylesheet" href="style/slideshow.css">
<link rel="stylesheet" href="style/button.css">
	<script type="text/javascript" src="script/general.js"></script>
	<script src="script/slideshow.flash.js"></script>
	<script>
		window.addEvent('domready', function(){
			var data = { '1.jpg': { caption: '1' }, '2.jpg': { caption: '2' }, '3.jpg': { caption: '3' }, '4.jpg': { caption: '4' }};
			new Slideshow.Flash('flash', data, { color: ['tomato', 'palegreen', 'orangered', 'aquamarine'], height: 350, hu: 'images/', width: 640 });
		});
		
		function pageScroll() {
    	window.scrollBy(0,10); // horizontal and vertical scroll increments
    	scrolldelay = setTimeout('pageScroll()',90); // scrolls every 100 milliseconds
}

function stopScroll() {
    	clearTimeout(scrolldelay);
}

	</script>

	

	<title>IIT Rajasthan Alumni Database</title>

	<meta name="description" content="" />

</head>

<body>

	<a name="top"></a>





	<div class="clsPageAlign">
		<div class="clsLogo"><a href="ind.php"><img src="images/logo.png" alt="IIT Rajasthan Alumni Database"></img></a></div>
<div id="flash" class="slideshow">
	<img src="images/1.jpg" alt="1">
</div>

<div id="outerspace" onmouseover="javascript:pageScroll()" onmouseout="javascript:stopScroll()" style=" float:right;background-image: url('images/outerspace.jpg'); position: absolute; height: 1050px; left:940px; top:50px; width:190px; z-index:1">
<div class="rocket" style="z-index: 4; position:absolute; left:0px; top:0px;">
<img src="images/rocket.gif" width="92" height="215" alt="rocket animation" >
</div>
</div>

<div id="sidebar">	
<a href="chooseGallery.php" style="text-decoration: none; color:white; position:absolute; left:-50px; top:70px;" class="button" id="galleryButton"> Gallery </a>
<a href="testimonial.php" style="text-decoration: none; color:white; position:absolute; left:90px; top:130px;" class="button" id="testimonialButton"> Testimonials </a>
<a href="#" style="text-decoration: none; color:white; position:absolute; left:-50px; top:190px;" class="button" id="iitjhomeButton"> IITJ Home</a>
<a href="#" style="text-decoration: none; color:white; position:absolute; left:90px; top:250px;" class="button" id="contactButton"> Contact us</a>
</div>
			<div id="weCreate">
				<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<a id="blink1" href="findFriends.php"><pre id="sbox">Search</pre></a> <a id="blink2" href="<?php if($logged=='y'){echo 'profile.php';} else{ echo 'login.php';}?>" ><pre id="slog"><?php if($logged=='y'){echo'Profile';} else{ echo 'Login';}?></pre></a> <a id="blink3" href="<?php if($logged=='y'){echo'logout.php';} else{ echo 'login.php';}?>" ><pre id="nlog"><?php if($logged=='y'){echo'Logout';} else{ echo 'New';}?></pre></a> 
			
			<br/><br/><br/><br/><br/><h2 style="position: relative; left:-90px;"> Stay Cool!</h2>
   
		 	</div>

			<div class="clsForm"><br/>
				<div id="share" style="position:absolute; left:42%;color: #111111">Events</div>
				<br/><br/><br/>
	<div id="mov" style="position: relative; left:190px; top:0px;">		
	<marquee width=1000 height=100 direction=up scrolldelay="200"> There are no Events at the moment<br/><br/><br/>
		There will be more events later on<br/><br/><br/>
		Still developing site<br/> 
		</marquee>
	</div>
			</div>

<div id="footer" style="position: relative; left:0px; bottom:200px; height:2px;width:920px; z-index:1">
				<hr/>
	</div></div>

<div style="background-color:rgb(55,19,20); opacity:.2; width:890px;position:relative; top:12px;left:14.5%;height:150px; width:920px;">
<ul>
<li></li>
	<li><a href="ind.php" style="text-decoration: none; opacity:1;color: white;" >Home</a></li>
<li><a href="ind.php" style="text-decoration: none; opacity:1;color: white;" >Contact us</a></li>
<li><a href="ind.php" style="text-decoration: none; opacity:1;color: white;" >Credits</a></li>				
	</ul>
</div>
</body>

</html>

