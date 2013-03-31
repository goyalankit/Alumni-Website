<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<?php
session_start();

require_once("connection_open.php");
require_once("EntryManagement.php");
 
if(!isset($_GET['roll_no'])){
 header("Location:login.php");
	
}
else{
	$details=getProfileInformation($_GET['roll_no'], $dbh);
	$prof=getProfessionInformation($_GET['roll_no'], $dbh);	  
	$univ=getUniversityInformation($_GET['roll_no'], $dbh);
}


?>

<html>
<head>
	<link type="text/css" rel="stylesheet" href="style/profile.css" />
	<title>Public Profile Page</title>
	<meta name="description" content="" />
</head>
<body>
	<div class="clsPageAlign">
		<div class="clsLogo"><a href="index.php"><img id="main" style="opacity: 1.0;" src="images/aa.jpg" alt="IIT Rajasthan Alumni Database"/></a>
					<div id="contact_details" style="border:solid; background: white;">
			<div class="div_field">
				<label id="email">Email:  </label>  <?php echo $details['0']['email'];?>
			</div>
			<div class="div_field">
				<label id="contact">Contact no.:  </label>  <?php echo $details['0']['phone'];?>
			</div>
			</div>
	
			<a href="index.php"><img id="home" src="images/onebit_01.png" alt="IIT Rajasthan Alumni Database"/></a>
			<a href="search.php"><img id="search" src="images/onebit_02.png" alt="IIT Rajasthan Alumni Database"/></a>
			<pre class="edit " id="edit"><a style="text-decoration: none;color:white; 	" href="profile.php">My profile</a></pre>
			<pre class="logout" id="logout"><a style="text-decoration: none;color:white; 	" href="logout.php">Logout</a></pre>
		</div>
	<div class="header">
		<div class="basic"><?php echo $details['0']['name'];?></div>
		<div class="content">
			<div class="div_field">
				<label id="department">Branch:  </label>     <?php echo $details['0']['department'];?> 
			</div>
			<div class="div_field">
				<label id="passyear">Passout Year:   </label>  <?php echo $details['0']['pass_year'];?>
			</div>
			<div class="div_field">
				<label id="passyear">Degree:   </label>  <?php echo $details['0']['programme'];?>
			</div>
			<div class="div_field">
				<label id="passyear">Roll no.:   </label>  <?php echo $details['0']['roll_no'];?>
			</div><br/>
			
			<div class="mid_heading">At IIT Rajasthan</div>
			
			
			<div class="divider"><img src="images/line.gif"/> </div><br/><br/>
			<div class="div_field">
				<label id="achievements">Achievements:   </label>  <?php echo $details['0']['achievements'];?>
			</div>
			<div class="div_field">
				<label id="internship">I did my internship at:  </label>  <?php echo $details['0']['internship'];?>
			</div>
			<div class="div_field">
				<label id="internship">Placed at:   </label>  <?php echo $details['0']['company_p'];?><label> as a
					 </label><?php echo $details['0']['designation'];?>
			</div>
			<div class="div_field">
				<label id="cpi">CPI:   </label>  <?php echo $details['0']['cpi'];?>
			</div><br/>
			
			<?php
			$i=0;
			if(isset($univ[0]['unviersity'])){
				if(!($details[0]['unviersity']=="")){
			echo '<div class="mid_heading">Higher Studies</div><div class="divider"><img src="images/line.gif"/> </div><br/>';
			echo '<div class="div_field"><label id="unviersity">University   </label>  '; echo $univ[$i]["unviersity"];
			echo '<br/><label id="unviersity">Period: </label> '; echo $univ[$i]['s_date']; echo "-"; echo $univ[$i]['e_date'];
			echo '<br/><label id="unviersity">Degree </label> '; echo $univ[$i]["u_programme"]; 
		echo'</div><hr/>';
		$i=$i+1;	
			 while(isset($univ[$i]['unviersity'])){
				if (!(($univ[$i]['s_date']=== $univ[$i-1]['s_date']) && ($univ[$i]['e_date']=== $univ[$i-1]['e_date']) )){
			
				
				 	
			echo '<div class="div_field"><label id="unviersity">University   </label>  '; echo $univ[$i]["unviersity"];
			echo '<br/><label id="unviersity">Period: </label> '; echo $univ[$i]['s_date']; echo "-"; echo $univ[$i]['e_date'];
			echo '<br/><label id="unviersity">Degree </label> '; echo $univ[$i]["u_programme"]; 
		echo'</div><hr/>';
	
}
			echo "";
			$i=$i+1;		}}}
			?>
			
			
<?php
			$i=0;
			if(isset($prof[0]['company'])){
				if(!($prof[0]['company']=="")){
			echo '<div class="mid_heading">Professional Carrier</div><div class="divider"><img src="images/line.gif"/> </div><br/>';
				echo '<div class="div_field"><label id="profession">Company: </label>  '; echo $prof[$i]["company"];
			echo '<br/><label id="unviersity">Designation: </label> '; echo $prof[$i]["designation"];
			echo '<br/><label id="unviersity">Period: </label> '; echo $prof[$i]['start_date']; echo "-"; echo $prof[$i]['end_date'];
			 echo '<br/><label id="unviersity">Work Place: </label> '; echo $prof[$i]["work_place"];
		echo'</div><hr/>';
		$i=$i+1;	
			 while(isset($prof[$i]['company'])){
				if (!(($prof[$i]['start_date']=== $prof[$i-1]['start_date']) && ($prof[$i]['end_date']=== $prof[$i-1]['end_date']))){
					if(!($prof[$i]['company']=="")){
								 	
			echo '<div class="div_field"><label id="unviersity">University   </label>  '; echo $prof[$i]["company"];
						echo '<br/><label id="unviersity">Designation: </label> '; echo $prof[$i]["designation"];
			echo '<br/><label id="unviersity">Period: </label> '; echo $prof[$i]['start_date']; echo "-"; echo $prof[$i]['end_date'];

			 echo '<br/><label id="unviersity">Work Place: </label> '; echo $prof[$i]["work_place"];
		echo'</div><hr/>';
	
}}
			echo "";
			$i=$i+1;		}}}
			?>
			
					
			<br/><div class="divider"><img src="images/feather.gif"/> </div>
			<div class="div_field"><br/>
				<br/><label id="dob">Date of Birth:   </label>  <?php echo $details['0']['dob'];?>
			</div>
			<div class="div_field">
				<label id="ms">Maritial Status:  </label>  <?php echo $details['0']['maritial_status'];?>
			</div>
			<div class="div_field">
				<label id="ca">Current Address:  </label>  <?php echo $details['0']['t_addtress'];?>
			</div>
			<div class="div_field">
				<label id="pa">Permanent Address:  </label>  <?php echo $details['0']['p_address'];?>
			</div>
			<div class="div_field">
				<label id="email">Email:  </label>  <?php echo $details['0']['email'];?>
			</div>
			<div class="div_field">
				<label id="contact">Contact no.:  </label>  <?php echo $details['0']['phone'];?>
			</div>
		</div>
	</div>
</div>
</body>
</html>
