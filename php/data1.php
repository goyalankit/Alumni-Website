<?php

session_start();
require_once("connection_open.php");



//INSERT INTO `website`.`student` (`roll_no`, `name`, `sex`, `age`, `dob`, `p_address`, `t_addtress`, `phone`, `blood`, `email`, `maritial_status`) VALUES ('J08018', 'Ankit', 'M', '21', '3-11-1990', '116 mdel flat 507 town', 'delhi', '90909', 'b+ve', 'ankitz@gmial.com', 'songle');

$name = $_REQUEST['name'];

$sql='UPDATE activation SET validated=1 WHERE act_email="'.$_SESSION['email'].'"';
$sth = $dbh->prepare($sql);
$success = $sth->execute();  
   if($success){
     echo "the new entry has been added";
     echo "\n";
        }else{
     print_r($sth->errorInfo());
        }


$i=1;
while(isset($_REQUEST['uName'.$i])){
$sql='INSERT INTO university VALUES ("'.$_REQUEST['roll'].'","'.$_REQUEST['s_date'.$i].'","'.$_REQUEST['e_date'.$i].'", "'.$_REQUEST['uName'.$i].'", "'.$_REQUEST['programme1'].'") ';	
$sth = $dbh->prepare($sql);
$success = $sth->execute();  
$i++;
}     
   if($success){
     echo "the new entry has been added";
     echo "\n";
        }else{
     print_r($sth->errorInfo());
        }
	if(!isset($_REQUEST['sex']))
	{
		$_REQUEST['sex']=null;
	}
	
	
	
$sql='INSERT INTO student VALUES ("'.$_REQUEST['roll'].'","'.$_REQUEST['name'].'","'.$_REQUEST['sex'].'", "'.$_REQUEST['dob'].'", "'.$_REQUEST['address'].'","'.$_REQUEST['Caddress'].'", "'.$_REQUEST['rphone'].'", "'.$_REQUEST['bloodgroup'].'", "'.$_REQUEST['email'].'","'.$_REQUEST['MaritialStatus'].'")'; 

$sth = $dbh->prepare($sql);
$success = $sth->execute();  
   
   if($success){
     echo "the new entry has been added";
     echo "\n";
        }else{
     print_r($sth->errorInfo());
        }

$sql='INSERT INTO placement VALUES ("'.$_REQUEST['roll'].'","'.$_REQUEST['company'].'","'.$_REQUEST['jobdescription'].'", "'.$_REQUEST['package'].'")'; 

$sth = $dbh->prepare($sql);
$success = $sth->execute();  
   
   if($success){
     echo "the new entry has been added";
     echo "\n";
        }else{
     print_r($sth->errorInfo());
        }
		
		
$sql='INSERT INTO academics VALUES ("'.$_REQUEST['roll'].'","'.$_REQUEST['department'].'","'.$_REQUEST['programme'].'", "'.$_REQUEST['internship'].'", "'.$_REQUEST['achievements'].'","'.$_REQUEST['cpi'].'","'.$_REQUEST['pass_year'].'")'; 

$sth = $dbh->prepare($sql);
$success = $sth->execute();  
   
   if($success){
     echo "the new entry has been added";
     echo "\n";
        }else{
     print_r($sth->errorInfo());
        }
				

	
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 1000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {

   $extension= getExtension($_FILES["file"]["name"]);    	
      move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$_REQUEST['roll'].".".$extension);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
    }
  }
else
  {
  echo "Invalid file";
  }
	
	 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
        
$i=1;

while(isset($_REQUEST['cName'.$i])){
$sql='INSERT INTO profession VALUES ("'.$_REQUEST['roll'].'","'.$_REQUEST['ps_date'.$i].'","'.$_REQUEST['pe_date'.$i].'", "'.$_REQUEST['cName'.$i].'", "'.$_REQUEST['desgnation'.$i].'", "'.$_REQUEST['wPlace'.$i].'") ';	
$sth = $dbh->prepare($sql);
$success = $sth->execute();  
$i++;
}     
   if($success){
//		header("Location:ind.php");
     echo "the new entry has been added";
     echo "\n";
        }else{
     print_r($sth->errorInfo());
        }
		

?>

