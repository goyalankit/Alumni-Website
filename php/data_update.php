<?php

session_start();
require_once("connection_open.php");



//INSERT INTO `website`.`student` (`roll_no`, `name`, `sex`, `age`, `dob`, `p_address`, `t_addtress`, `phone`, `blood`, `email`, `maritial_status`) VALUES ('J08018', 'Ankit', 'M', '21', '3-11-1990', '116 mdel flat 507 town', 'delhi', '90909', 'b+ve', 'ankitz@gmial.com', 'songle');

$name = $_REQUEST['name'];

/*$sql="UPDATE activation SET validated=1 WHERE act_email='".$_SESSION['email']."'";
$sth = $dbh->prepare($sql);
$success = $sth->execute();  
   if($success){
     echo "the new entry has been added";
     echo "\n";
        }else{
     print_r($sth->errorInfo());
        }

*/
$i=1;
$sql = 'select * from university where roll_no = "'.$_REQUEST['roll'].'"';
$sth = $dbh->prepare($sql);
$success = $sth->execute(); 
$rc = $sth->rowCount();
while(isset($_REQUEST['uName'.$i])){
  if($i>$rc)
  {
    $sql='INSERT INTO university VALUES ("'.$_REQUEST['roll'].'","'.$_REQUEST['s_date'.$i].'","'.$_REQUEST['e_date'.$i].'", "'.$_REQUEST['uName'.$i].'", "'.$_REQUEST['programme'.$i].'") ';
    //echo $sql."<br>";
    $sth = $dbh->prepare($sql);
    $success = $sth->execute(); 
  }
  else
  {
    $sql='update university set s_date = "'.$_REQUEST['s_date'.$i].'", e_date = "'.$_REQUEST['e_date'.$i].'", unviersity = "'.$_REQUEST['uName'.$i].'", u_programme = "'.$_REQUEST['programme1'].'" where roll_no = "'.$_REQUEST['roll'].'" and s_date = "'.$_REQUEST['s_date'.$i].'" and e_date = "'.$_REQUEST['e_date'.$i].'"';	
    //echo 1;
    //echo $sql."<br>";
    $sth = $dbh->prepare($sql);
    $success = $sth->execute();
  }
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
	
	
	
$sql='UPDATE student SET roll_no = "'.$_REQUEST['roll'].'", name = "'.$_REQUEST['name'].'", sex = "'.$_REQUEST['sex'].'", dob = "'.$_REQUEST['dob'].'", p_address = "'.mysql_real_escape_string($_REQUEST['address']).'", t_addtress = "'.mysql_real_escape_string($_REQUEST['Caddress']).'", phone = "'.$_REQUEST['rphone'].'", blood = "'.$_REQUEST['bloodgroup'].'", email = "'.mysql_real_escape_string($_REQUEST['email']).'", maritial_status = "'.$_REQUEST['MaritialStatus'].'" WHERE roll_no="'.$_REQUEST['roll'].'"';

$sth = $dbh->prepare($sql);
$success = $sth->execute();  
   
   if($success){
     echo "the new entry has been added";
     echo "\n";
        }else{
     print_r($sth->errorInfo());
        }

$sql='UPDATE placement SET roll_no = "'.$_REQUEST['roll'].'", company_p = "'.$_REQUEST['company'].'", job_desciption = "'.$_REQUEST['jobdescription'].'", package = "'.$_REQUEST['package'].'" WHERE roll_no="'.$_REQUEST['roll'].'"';

$sth = $dbh->prepare($sql);
$success = $sth->execute();  
   
   if($success){
     echo "the new entry has been added";
     echo "\n";
        }else{
     print_r($sth->errorInfo());
        }
		
		
$sql='UPDATE academics SET roll_no = "'.$_REQUEST['roll'].'", department = "'.$_REQUEST['department'].'", programme = "'.$_REQUEST['programme'].'", internship = "'.$_REQUEST['internship'].'", achievements = "'.$_REQUEST['achievements'].'", cpi = "'.$_REQUEST['cpi'].'", pass_year = "'.$_REQUEST['pass_year'].'" WHERE roll_no="'.$_REQUEST['roll'].'"';

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
$sql = 'select * from profession where roll_no = "'.$_REQUEST['roll'].'"';
$sth = $dbh->prepare($sql);
$success = $sth->execute(); 
$rc = $sth->rowCount();
while(isset($_REQUEST['cName'.$i])){
  if($i>$rc)
  {
    $sql='INSERT INTO profession VALUES ("'.$_REQUEST['roll'].'","'.$_REQUEST['ps_date'.$i].'","'.$_REQUEST['pe_date'.$i].'", "'.$_REQUEST['cName'.$i].'", "'.$_REQUEST['desgnation'.$i].'", "'.$_REQUEST['wPlace'.$i].'") ';	
    $sth = $dbh->prepare($sql);
    $success = $sth->execute(); 
  }
  else
  {
    $sql='UPDATE profession SET roll_no = "'.$_REQUEST['roll'].'", start_date = "'.$_REQUEST['ps_date'.$i].'", end_date = "'.$_REQUEST['pe_date'.$i].'", company = "'.$_REQUEST['cName'.$i].'", designation = "'.$_REQUEST['desgnation'.$i].'", work_place = "'.$_REQUEST['wPlace'.$i].'" WHERE roll_no="'.$_REQUEST['roll'].'" and start_date = "'.$_REQUEST['ps_date'.$i].'"';
    $sth = $dbh->prepare($sql);
    $success = $sth->execute(); 
  }
$i++;
}     
   if($success){
//		header("Location:index.php");
     echo "the new entry has been added";
     echo "\n";
        }else{
     print_r($sth->errorInfo());
        }
		

?>
