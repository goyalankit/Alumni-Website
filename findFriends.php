<?php
require_once("connection_open.php");
?>
<html>



<head>

	<style>
	
	#heading{
		display:block;
border:1px solid #ffffff;		
		border-collapse: collapse;
	background-color: rgb(201,41,15);
	}
	#data{
		
		position: absolute;
		left:18px;
		
	}
		#customers
{
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
width:100%;
border-collapse:collapse;
}
#customers td, #customers th 
{
font-size:.8em;
border:1px solid #ffffff;
padding:3px 7px 2px 7px;
width: 200px;
color:rgb(34,49,69);
}
#customers th 
{
font-size:.9em;
text-align:left;
padding-top:5px;
padding-bottom:4px;
background-color:rgb(34,49,69);;
color:#ffffff;
}
#customers tr.alt td tr
{
background-color:#FFFFFF;
color:#FFFFFF;
}

#customers td{
	background-color:#FFFFff;
color:#000000;	
}
</style>


	<link type="text/css" rel="stylesheet" href="style/general.css" /> 
	

	<title>IIT Rajasthan Alumni Database</title>

<style type="text/css">

</style>

</head>

<body>


<form action="findFriends.php" method="post" enctype="multipart/form-data">
	<a name="top"></a>

	

	<div class="clsPageAlign">



		<div class="clsLogo"><a href="ind.php"><img src="images/logo.png" alt="IIT Rajasthan Alumni Database"></img></a></div>


		<div class="clsMainContent">

			<div class="clsGrayBG">

				
				<div class="clsContentText">

					<h1>Search Student Database</h1>
			<select style="border: solid; margin: 5px;" name="type">
			<option id="sele"  selected="selected" >Select Search Type</option>
  			<option value="name" onclick='showname1();'>Name</option>
  			<option value="roll_no" onclick="showname2();">Roll No</option>
  			<option value="year" onclick="showname3();">Passout Year</option>
			</select>
        		<input id="name" type="text" name="name" style="border: solid; margin: 5px;"/> 
        		<button type="submit" name="submit" style="position: absolute; left:660px; margin: 5px; "> Search </button>
        <br/>
        
        <br/><br/><br/><br/><br/><br/>
        </div>   </div>        </div>
	<br/>
			</form>
		<div id="data">
<?php
if(isset($_REQUEST['submit']))
{

if($_REQUEST['name']!=NULL){
$name = $_REQUEST['name'];
 
if($_REQUEST['type']=='name'){
$sql = 'SELECT name AS NAME, S.roll_no AS "ROLL NO", pass_year AS "PASSOUT YEAR", department AS DEPARTMENT, programme AS PROGRAMME FROM STUDENT S, ACADEMICS A WHERE name="'.$name.'" AND S.roll_no=A.roll_no';
}
if($_REQUEST['type']=='roll_no'){
	$sql = 'SELECT * FROM STUDENT WHERE roll_no="'.$_REQUEST['name'].'"';
}
//$sql = 'SELECT * FROM STUDENT S, ACADEMICS A WHERE name="'.$_REQUEST['name'].'" AND S.roll_no=A.roll_no';
if($_REQUEST['type']=='year'){
	
	$sql = 'SELECT S.roll_no AS "ROLL NO", S.name AS NAME, sex AS SEX, department AS DEPARTMENT, programme AS PROGRAMME, phone AS CONTACT,email AS "E-mail"  FROM STUDENT S, ACADEMICS A WHERE A.pass_year="'.$_REQUEST['name'].'" AND S.roll_no=A.roll_no';
}

$sth = $dbh->prepare($sql);
$success = $sth->execute();  
  
if(!(strpos($sql,"SELECT")=== FALSE) OR !((strpos($sql,"SHOW")=== FALSE)) OR !(strpos($sql,"DESCRIBE")=== FALSE)){
	
	//echo("SELECT STATEMENT LAUNCHED");
	  
$hist = $sth->fetchAll();   
   
   //GETTING THE COLUMN HEADERS AND PRINTING THEM STRAIGHT FROM THE DATABASE
  echo "<table id="."customers"."><tc>" ;
 $k=0;
 echo "<tr class="."alt".">";
 foreach($hist as $i => $array){ 
 	foreach($array as $inner_key => $value){ 		
	if($k%2==0){	echo "<th>".$inner_key."</th>";
		$attr[$k] = $inner_key;
	}
		$k++;   
 }  
 break;
 } 	
 echo "</tr>";
}
   echo "</br></br>";
      
 foreach($hist as $i => $array){
 	$l=0;echo "<tr>";
		for($j=0;$l<sizeof($attr);$j=$j+2, $l++){ 
 	//print_r($hist[$i]);
	 $index=$attr[$j];
	 if($index=='ROLL NO' || $index=='roll_no' ){echo "<td><a href='frndprof.php?roll_no=".$hist[$i][$index]."'>".$hist[$i][$index]."</a></td>";}
else {echo "<td>".$hist[$i][$index]."</td>";}
	}
echo "</tr>";	
 }
   echo "</table><br/>";
//   print_r($data);
 
}	
else echo "PLEASE ENTER SOME VALUE";

}
		
		?>
		

<br/>
<br/>		
</div>

				</body>

</html>

