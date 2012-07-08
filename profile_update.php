<?php
session_start();
require_once("connection_open.php");
require_once("EntryManagement.php");
if(!isset($_SESSION['username'])){
 header("Location:login.php");
}
else{
	$details=getProfileInformation($_SESSION['username'], $dbh);
	$prof = getProfessionInformation($_SESSION['username'], $dbh);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
	
	<head>

		<script language="javascript" type="text/javascript" src="script/datetimepicker.js"></script>
		<script language="javascript" type="text/javascript" src="script/validateReg.js"></script>	
		<script src="script/mootools-1.3.1-core.js"></script>
		<script src="script/mootools-1.3.1.1-more.js"></script>
		<script src="script/slideshow.js"></script>
		<script type="text/javascript" src="script/general.js"></script>

		<link type="text/css" rel="stylesheet" href="style/general.css" /> 

		<title>IIT Rajasthan Alumni Database</title>

	</head>

	<body>


		<form action="data_update.php" method="post" enctype="multipart/form-data">
			<a name="top"></a>
			
			<div class="clsPageAlign">
			<div class="clsLogo"><a href="ind.php"><img src="images/logo.png" alt="IIT Rajasthan Alumni Database"></img></a></div>
			<div class="clsMainContent">
				<div class="clsGrayBG">
					<div class="clsContentText">
						<h1>New Record Information</h1>			
				 		
				 		<div id="div_name">  
               				<label id="label_name" for="name">Name: </label>
        					<input id="name" type="text" name="name" value="<?php echo $details['0']['name']; ?>" />
        				</div><br/>
            
                    	 <div id="div_roll">  
         				    <label id="label_roll" for="roll">Roll Number: </label>
        					<input id="roll" type="text" name="roll" value="<?php echo $details['0']['roll_no']; ?>"/>
            	 		 </div><br/>
            	
            	 		<div id="div_dob">  
               				<label id="label_dob" for="name">Date of Birth: </label>
        					<input id="dob" type="text" name="dob" value="<?php echo $details['0']['dob']; ?>"/><a class="dobpicker" href="javascript:NewCal('dob','ddmmyyyy')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
          				</div><br/>
          
          	           <div id="div_rphone">  
            			   <label id="label_rphone" for="rphone" >Contact Number: </label>
        				   <input id="rphone" type="text" name="rphone" value="<?php echo $details['0']['phone']; ?>" onfocusout='checknumber(rphone)'/>
          				</div><br/> 
				
						<div id="div_address">  
               				<label id="label_address" for="address">Permanent Address: </label>
        					<textarea id="address" cols="25" rows="3" name="address" ><?php echo $details['0']['p_address']; ?>"</textarea>
          				</div><br/><br/><br/>	
			
						<div id="div_address">  
               				<label id="label_address" for="address">Current Address: </label>
        					<textarea id="address" cols="25" rows="3" name="Caddress"><?php echo $details['0']['t_addtress']; ?></textarea>
          				</div><br/><br/><br/>
				
						<div id="div_sex">  
               				<label id="label_sex" for="address">Sex: </label>
        					<label class="lsexm">M</label><input <?php if($details['0']['sex']=='M'){echo "checked='checked'";} ?> class="sexm" id="sexm" type="radio"   name="sex" value="M"/>
        					<label class="lsexf">F</label><input <?php if($details['0']['sex']=='F'){echo "checked='checked'";} ?>  id="sexf" class="sexf" type="radio"  name="sex" value="F"/>
          				</div><br/>	
			
				
						<div id="div_MaritialStatus">  
               				<label id="label_MaritialStatus" for="MaritialStatus">Maritial Status: </label>
        					<select name="MaritialStatus" id="MaritialStatus" class="MaritialStatus">
        					<option <?php if($details['0']['maritial_status']=='Choose one..'){echo "selected='selected'";} ?>>Choose one..</option>
        					<option <?php if($details['0']['maritial_status']=='Bachelor'){echo "selected='selected'";} ?>>Bachelor</option>
        					<option <?php if($details['0']['maritial_status']=='Married'){echo "selected='selected'";} ?>>Married</option>
        					<option <?php if($details['0']['maritial_status']=='Divorced'){echo "selected='selected'";} ?>>Divorced</option>
        					<option <?php if($details['0']['maritial_status']=='Separated'){echo "selected='selected'";} ?>>Separated</option>
        					<option <?php if($details['0']['maritial_status']=='Prefer not to say'){echo "selected='selected'";} ?>>Prefer not to say</option>
        				</select><br/>
          				</div><br/>	
			
          
          				<div id="div_email">  
               				<label id="label_email" for="email">Email: </label>
        					<input id="email" type="text" name="email" value="<?php echo $details['0']['email'];?>"/>
          				</div><br/>
          
          				<div id="div_bloodgroup">  
               				<label id="label_bloodgroup" for="bloodgroup">Blood Group: </label>
        					<select name="bloodgroup" id="bloodgroup" class="bloodgroup" >
        						<option>Choose one..</option>
        						<option <?php if($details['0']['blood']=='A +ve'){echo "selected='selected'";} ?>>A +ve</option><option<?php if($details['0']['blood']=='A -ve'){echo "selected='selected'";} ?>>A -ve</option><option <?php if($details['0']['blood']=='B +ve'){echo "selected='selected'";} ?>>B +ve</option><option <?php if($details['0']['blood']=='B -ve'){echo "selected='selected'";} ?>>B -ve</option><option <?php if($details['0']['blood']=='AB +ve'){echo "selected='selected'";} ?>>AB +ve</option><option <?php if($details['0']['blood']=='AB -ve'){echo "selected='selected'";} ?>>AB -ve</option><option <?php if($details['0']['blood']=='O +ve'){echo "selected='selected'";} ?>>O +ve</option><option <?php if($details['0']['blood']=='O -ve'){echo "selected='selected'";} ?>>O -ve</option>
        					</select>
          					</div><br/>
          
          <h2>Academics</h2><hr/>
          
          <div id="div_department">  
               <label id="label_department" for="department">Department: </label>
        		<select name="department" id="department" class="department">
        			<option>Choose one..</option>
        			<option <?php if($details['0']['department']=='Computer Science and Engineering'){echo "selected='selected'";} ?> value="Computer Science and Engineering">CSE</option><option value="Electrical Engineering" <?php if($details['0']['department']=='Electrical Engineering'){echo "selected='selected'";} ?>>EE</option><option value="Mechanical Engineering"  <?php if($details['0']['department']=='Mechanical Engineering'){echo "selected='selected'";} ?>>ME</option><option <?php if($details['0']['department']=='Control Systems'){echo "selected='selected'";} ?>>Control Systems</option>
        		</select>
          </div><br/>
          
          <div id="div_programme">  
               <label id="label_programme" for="programme">Programme: </label>
        		<select name="programme" id="programme" class="programme">
        			<option>Choose one..</option>
        			<option value="Bachelor of Technology" <?php if($details['0']['programme']=='Bachelor of Technology'){echo "selected='selected'";} ?>>B.Tech</option><option value="Master of Technology" <?php if($details['0']['programme']=='Master of Technology'){echo "selected='selected'";} ?>>M.Tech</option><option value="Doctor of Philosophy(ph.d)" <?php if($details['0']['programme']=='Doctor of Philosophy(ph.d)'){echo "selected='selected'";} ?>>Ph.d</option>
        		</select>
          </div><br/>
          
           <div id="div_year">  
               <label id="label_year" for="year">Passout Year: </label>
               <select name="pass_year" id="year" class="yeardropdown">
               	<option<?php if($details['0']['pass_year']=='choose one..'){echo "selected='selected'";} ?>>choose one..</option><option <?php if($details['0']['pass_year']=='2012'){echo "selected='selected'";} ?>>2012</option><option<?php if($details['0']['pass_year']=='2013'){echo "selected='selected'";} ?>>2013</option><option <?php if($details['0']['pass_year']=='2014'){echo "selected='selected'";} ?>>2014</option><option <?php if($details['0']['pass_year']=='2015'){echo "selected='selected'";} ?>>2015</option>
               	<option <?php if($details['0']['pass_year']=='2016'){echo "selected='selected'";} ?>>2016</option><option <?php if($details['0']['pass_year']=='2017'){echo "selected='selected'";} ?>>2017</option><option <?php if($details['0']['pass_year']=='2018'){echo "selected='selected'";} ?>>2018</option><option <?php if($details['0']['pass_year']=='2019'){echo "selected='selected'";} ?>>2019</option><option <?php if($details['0']['pass_year']=='2020'){echo "selected='selected'";} ?>>2020</option>
               	<option <?php if($details['0']['pass_year']=='2021'){echo "selected='selected'";} ?>>2021</option><option <?php if($details['0']['pass_year']=='2022'){echo "selected='selected'";} ?>>2022</option><option <?php if($details['0']['pass_year']=='2023'){echo "selected='selected'";} ?>>2023</option><option <?php if($details['0']['pass_year']=='2024'){echo "selected='selected'";} ?>>2024</option><option <?php if($details['0']['pass_year']=='2025'){echo "selected='selected'";} ?>>2025</option>
               	<option <?php if($details['0']['pass_year']=='2026'){echo "selected='selected'";} ?>>2026</option ><option <?php if($details['0']['pass_year']=='2027'){echo "selected='selected'";} ?>>2027</option><option <?php if($details['0']['pass_year']=='2028'){echo "selected='selected'";} ?>>2028</option><option <?php if($details['0']['pass_year']=='2029'){echo "selected='selected'";} ?>>2029</option><option <?php if($details['0']['pass_year']=='2030'){echo "selected='selected'";} ?>>2030</option>
               	<option <?php if($details['0']['pass_year']=='2031'){echo "selected='selected'";} ?>>2031</option><option <?php if($details['0']['pass_year']=='2032'){echo "selected='selected'";} ?>>2032</option><option <?php if($details['0']['pass_year']=='2033'){echo "selected='selected'";} ?>>2033</option><option <?php if($details['0']['pass_year']=='2034'){echo "selected='selected'";} ?>>2034</option><option <?php if($details['0']['pass_year']=='2035'){echo "selected='selected'";} ?>>2035</option>
               </select><br/>	
          </div><br/>
          
          
          <div id="div_internship">  
               <label id="label_internship" for="internship">Internship: </label>
        		<textarea id="internship" cols="25" rows="3" name="internship">
        			<?php echo $details['0']['internship'];?>
        		</textarea>
          </div><br/><br/><br/>
          
          <div id="div_achievements">  
               <label id="label_achievements" for="achievements">Achievements: </label>
        		<textarea id="achievements" cols="25" rows="3" name="achievements">
        			<?php echo $details['0']['achievements'];?>
        		</textarea>
          </div><br/><br/><br/>				
				
			<div id="div_cpi">  
               <label id="label_cpi" for="cpi">CPI: </label>
        		<input id="cpi" type="text" name="cpi" value="<?php echo $details['0']['cpi'];?>" />
          </div><br/>
          
<script type="text/javascript">
window.onload=function(){
populatedropdown1("year")
}
</script>          
          
<script type="text/javascript">
function addMore(num){
	num++;
	num1=num+1;
	var s_d='s_date'+num;
	var ddmmyy='ddmmyyyy';
	var e_d='e_date'+num;
	document.getElementById('detail'+num).innerHTML=' <label id="label_UD1" for="UD1">Start Date: </label><input id="s_date'+num+'" class="u_date" type="text" name="s_date'+num+'"/><a class="dobpicker" href="javascript:NewCal(\''+s_d+'\',\''+ddmmyy+'\')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a><br/><label id="label_UD1" for="UD1">End Date: </label><input id="e_date'+num+'" class="u_date" type="text" name="e_date'+num+'"/><a class="dobpicker" href="javascript:NewCal(\''+e_d+'\',\''+ddmmyy+'\')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a><br/></div><div id="div_uName1">  <label id="label_uName1" for="uName1">University: </label><input class="uname" id="uName'+num+'" type="text" name="uName'+num+'"/></div><br/><div id="div_programme1">  <label id="label_programme1" for="programme1">Programme: </label><input class="prog" id="programme'+num+'" type="text" name="programme'+num+'"/></div><br/><hr/><div id="detail'+num1+'"></div>';
	document.getElementById('addmore').innerHTML='<button type="button" onclick="addMore('+ num +')">Add even more</button>';
}
</script>          	
        <div id="univ_details">  
        <h2>University</h2>
         <?php 
		    $i=1;
		    $sql = 'select * from university where roll_no = "'.$_SESSION['username'].'"';
		    $sth = $dbh->prepare($sql); 
		    $success = $sth->execute();
		    $detail = $sth->fetchAll();
		    $rc = $sth->rowCount();
		    while($i<=$rc)
		    {
		  ?>
         <div id="div_UD1">
         	<legend> University Details: <?php echo $i; ?> </legend>
         	<hr /> 
         	 
		    
                 <label id="label_UD1" for="UD1">Start Date: </label><input id="s_date<?php echo $i; ?>" class="u_date" type="text" name="s_date<?php echo $i; ?>" value="<?php echo $detail[$i-1]['s_date'];?>"/><a class="dobpicker" href="javascript:NewCal('s_date1','ddmmyyyy')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a><br/>
        		<label id="label_UD1" for="UD1">End Date: </label><input id="e_date<?php echo $i; ?>" class="u_date" type="text" name="e_date<?php echo $i; ?>" value="<?php echo $detail[$i-1]['e_date'];?>"/><a class="dobpicker" href="javascript:NewCal('e_date1','ddmmyyyy')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a><br/>
          </div>
          <div id="div_uName1">  
               <label  id="label_uName1" for="uName1">University: </label>
        		<input class="uname" id="uName<?php echo $i; ?>" type="text" name="uName<?php echo $i; ?>" value="<?php if(isset($detail[$i-1]['unviersity']))echo $details[$i-1]['unviersity'];?>"/>
          </div><br/>
			<div id="div_programme1">  
               <label id="label_programme1" for="programme1">Programme: </label>
        		<input class="prog" id="programme<?php echo $i; ?>" type="text" name="programme<?php echo $i; ?>" value="<?php if(isset($detail[$i-1]['u_programme']))echo $details[$i-1]['u_programme'];?>"/>
          </div><br/>
	<hr/><br>
	<?php
		  $i++;
		  }
	?>
	<div id="detail<?php echo $i; ?>"></div>
		<div id="addmore"><button type="button" onclick="addMore(<?php echo $i-1; ?>)">Add more</button></div> 
          </div>
          




        <div id="prof_details">  
        <h2>Profession</h2>
          <?php 
		    $i=1;
		    $sql = 'select * from profession where roll_no = "'.$_SESSION['username'].'"';
		    $sth = $dbh->prepare($sql); 
		    $success = $sth->execute();
		    $details = $sth->fetchAll();
		    $rc = $sth->rowCount();
		    while($i<=$rc)
		    {
		  ?>
         <div id="div_PD1">
         	<legend> Professional Details <?php echo $i; ?> </legend>
         	<hr />
                     <label id="label_UD1" for="UD1">Start Date: </label><input id="ps_date<?php echo $i; ?>" class="u_date" type="text" name="ps_date<?php echo $i; ?>" value="<?php echo $details[$i-1]['start_date'];?>"/><a class="dobpicker" href="javascript:NewCal('ps_date1','ddmmyyyy')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a><br/>
        		<label id="label_UD1" for="UD1">End Date: </label><input id="pe_date<?php echo $i; ?>" class="u_date" type="text" name="pe_date<?php echo $i; ?>" value="<?php echo $details[$i-1]['end_date'];?>"/><a class="dobpicker" href="javascript:NewCal('pe_date1','ddmmyyyy')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a><br/>
    
          </div>
          <div id="div_cName1">  
               <label  id="label_cName1" for="cName1">Company: </label>
        		<input class="uname" id="cName<?php echo $i; ?>" type="text" name="cName<?php echo $i; ?>" value="<?php echo $details[$i-1]['company'];?>"/>
          </div><br/>
			<div id="div_desgnation1">  
               <label id="label_desgnation1" for="desgnation1">Desgnation: </label>
        		<input class="prog" id="desgnation<?php echo $i; ?>" type="text" name="desgnation<?php echo $i; ?>" value="<?php echo $details[$i-1]['designation'];?>"/>
          </div><br/>
                <div id="div_cName1">  
               <label  id="label_cName1" for="cName1">Work Place: </label>
        		<input class="uname" id="cName<?php echo $i; ?>" type="text" name="wPlace<?php echo $i; ?>" value="<?php echo $details[$i-1]['work_place'];?>"/>
          </div><br/>
	
	<hr/><br>
	<?php
		  $i++;
		  }
	?>
	<div id="moreProf<?php echo $i; ?>"></div>
	
	
		<div id="addmore2"><button type="button" onclick="addMoreProf(<?php echo $i-1; ?>)">Add more</button></div> 
          </div>
<script type="text/javascript">          
function addMoreProf(num){
	num++;
	num1=num+1;
	var s_d='ps_date'+num;
	var e_d='pe_date'+num;
	var ddmmyy='ddmmyyyy';
	document.getElementById('moreProf'+num).innerHTML='  <label id="label_UD1" for="UD1">Start Date: </label><input id="ps_date'+num+'" class="u_date" type="text" name="ps_date'+num+'"/><a class="dobpicker" href="javascript:NewCal(\''+s_d+'\',\''+ddmmyy+'\')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a><br/><label id="label_UD1" for="UD1">End Date: </label><input id="pe_date'+num+'" class="u_date" type="text" name="pe_date'+num+'"/><a class="dobpicker" href="javascript:NewCal(\''+e_d+'\',\''+ddmmyy+'\')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a><br/></div><div id="div_cName1">  <label  id="label_cName1" for="cName1">Company: </label><input class="uname" id="cName'+num+'" type="text" name="cName'+num+'"/></div><br/><div id="div_desgnation1">  <label id="label_desgnation1" for="desgnation1">Desgnation: </label><input class="prog" id="desgnation'+num+'" type="text" name="desgnation'+num+'"/></div><br/><div id="div_cName1">  <label  id="label_cName1" for="cName1">Work Place: </label><input class="uname" id="cName'+num+'" type="text" name="wPlace'+num+'"/></div><br/>	<hr/><div id="moreProf'+num1+'"></div>	<div id="addmore">'
	document.getElementById('addmore2').innerHTML='<button type="button" onclick="addMoreProf('+num+')">Add more</button></div> ';
}

</script>



          
          <h1>Placement</h1>
          <?php 
		    $i=1;
		    $sql = 'select * from placement where roll_no = "'.$_SESSION['username'].'"';
		    $sth = $dbh->prepare($sql); 
		    $success = $sth->execute();
		    $details = $sth->fetchAll();
		    $rc = $sth->rowCount();
		    while($i<=$rc)
		    {
		  ?>
          <div id="div_company">  
               <label id="label_company" for="company">Company: </label>
        		<input id="company" type="text" name="company" value="<?php echo $details[$i-1]['company_p'];?>"/>
          </div><br/>
          
          <div id="div_jobdescription">  
               <label id="label_jobdescription" for="jobdescription">Job Description: </label>
        		<input id="jobdescription" type="text" name="jobdescription" value="<?php echo $details[$i-1]['job_desciption'];?>"/>
          </div><br/>
          
          <div id="div_package">  
               <label id="label_package" for="package">Package: </label>
        		<input id="package" type="text" name="package" value="<?php echo $details[$i-1]['package'];?>"/>
          </div><br/>          
	<?php
		  $i++;
		  }
	?>
	<br/>
          <button id="subM" type="submit" value="Submit"> Add Record </button><button id="Res" type="reset" value="Submit"> Reset </button>  	

				</div>


				</div>
				
			
</form>

				</body>

</html>

