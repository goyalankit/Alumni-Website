<?php 

function checkUsernameAndPassword($username,$password,$dbh){
	$sql = 'SELECT * FROM `website`.`login_information` WHERE 
`username`= :username and `password`=:password ;';
  
  $sth = $dbh->prepare($sql);
  $data['username']=trim($username);
  $data['password']=trim($password);
  $success = $sth->execute($data);
  $details = $sth->fetchAll();
    return $details;
}

function getUniversityInformation($username, $dbh){
	
	$sql = 'SELECT * FROM UNIVERSITY WHERE roll_no="'.$username.'"';
	  $sth = $dbh->prepare($sql);
	  $success = $sth->execute();
	  $details = $sth->fetchAll();
    return $details;
}

function getProfileInformation($username, $dbh){
	$sql = 'SELECT * FROM STUDENT S, ACADEMICS A, PLACEMENT P, PROFESSION F, UNIVERSITY U WHERE S.roll_no="'.$username.'" AND S.roll_no=A.roll_no AND S.roll_no=U.roll_no AND S.roll_no=F.roll_no AND S.roll_no=P.roll_no';
	  $sth = $dbh->prepare($sql);
	  $success = $sth->execute();
	  $details = $sth->fetchAll();
    return $details;
}

function getProfessionInformation($username, $dbh){
	$sql = 'SELECT * FROM PROFESSION WHERE roll_no="'.$username.'"';
	  $sth = $dbh->prepare($sql);
	  $success = $sth->execute();
	  $details = $sth->fetchAll();
    return $details;
	
}

function checkIfAccountExist($email, $dbh){
	$sql = 'SELECT * FROM ACTIVATION WHERE act_email="'.$email.'" AND validated="1"';
	$sth = $dbh->prepare($sql);
	$success = $sth->execute();
	$details = $sth->fetchAll();
	return $sth->rowCount();
}
function insertActivationCode($email, $code, $dbh){

$sql = 'SELECT * FROM ACTIVATION WHERE act_email="'.$email.'" AND validated="0"';
	$sth = $dbh->prepare($sql);
	$success = $sth->execute();
	$details = $sth->fetchAll();
	
	if($sth->rowCount()!=0){
$sql='UPDATE activation SET act_code="'.$code.'" WHERE act_email="'.$email.'"';
$sth = $dbh->prepare($sql);
$success = $sth->execute();  
   if($success){
     echo "the new entry has been added";
     echo "\n";
        }else{
     print_r($sth->errorInfo());
        }
	}
	else{
$sql='INSERT INTO ACTIVATION VALUES ("'.$email.'","'.$code.'","0")'; 

	$sth = $dbh->prepare($sql);
	$success = $sth->execute();
	$details = $sth->fetchAll();}
	if($success){
        }else{
     header('Location:error.php?type=0');
        }
    return $details;

}

function matchActivationCode($code, $email, $dbh){
	$sql = 'SELECT * FROM ACTIVATION WHERE act_email="'.$email.'" AND act_code="'.$code.'" AND validated="0"';
	$sth = $dbh->prepare($sql);
	$success = $sth->execute();
	if($success){
        }else{
     header('Location:error.php?type=0');
        }
	$details = $sth->fetchAll();
	return $sth->rowCount();
}



?>