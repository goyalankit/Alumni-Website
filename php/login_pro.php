<?php 
session_start();
  require_once("connection_open.php");
  require_once("EntryManagement.php");
 
  if(!isset($form)){
  $form['username']= $_REQUEST["username"];
  $form['password']= $_REQUEST["password"];
  $_SESSION['form']=$form;  
  }
  else
 {header('Location:login.php');}
  
  $errors = validate($form);
    
  if(count($errors) >0){
    session_unset();
    $_SESSION["errors"] = $errors;
    //header('Location:login.php');
	print_r($errors)	;
      }
  else
 {
   
   $rot = checkUsernameAndPassword($form['username'],$form['password'],$dbh);
 if($rot['0']['username']==$form['username']){
    $_SESSION['username']=$form['username'];
    $_SESSION["errors"] = null;
     header('Location:profile.php'); 
 }
else{
  $errors[] = "username and password doesnot match";
  $_SESSION["errors"] = $errors;
  header('Location:login.php');
  
}
   //}
   
 }
   
   
   
    function validate($form){
  
   $non_empty=array(0 => "username","password");
  
   foreach($non_empty as $i => $value){
    if(validateNotVaccant($form,$value)){
  $errors[]=   validateNotVaccant($form,$value); 
  }
        
  }
  
    
  if(validateName($form,"username"))
  $errors[]= validateName($form,"username");
 
  
  // Validate detail
  if(validatePassword($form,"password"))
  $errors[]= validatePassword($form,"password");
  
  return $errors;
  }
  
  
  

/* Validationes  */
/* ************* */



 /* Check that the element with the id is not empty
  * If it contains the error,Returns a string with the error and empty string otherwise.
*/

function validateNotVaccant($form,$id){
  
    
if(!(isset($form[$id]) && strlen($form[$id])>0)){
    $error = "The field <b> $id</b> can't be empty <br />";
return $error;
}
  

}


function validateName($form,$id){
    
  $numbers= array(0=>'0',1=>'1',2=>'2',3=>'3',4=>'4',5=>'5',6=>'6',7=>'7',8=>'8',9=>'9');

  $punctuation =array(0=>'~','!','@','#','$','%','^','&','*','(',')','_','+','-','=','}','{','[',']','|','/',':','>','<',';','"','`');

  
  if((contains($form[$id],$punctuation) > 0)){
    
    $error = "The <b> $id </b> contains the invalid characters <br />\n";
  return $error;    
  }
  

}

function validatePassword ($form,$id1){
  
 $Psswd = $form[$id1];
  
    
    $len_psswd = strlen($Psswd);
    if ($len_psswd < 5) {
              $error = "The <b>password</b> is too short <br/>\n";
    }
   
   
   
    $punctuation =array(0=>'~','!','@','#','$','%','^','&','*','(',')','_','+','-','=','}','{','[',']','|','/',':','>','<',';','"','`');

  
  if((contains($form[$id1],$punctuation) > 0)){
    
    $error = "The <b> Password </b> contains the invalid characters,only alphanumeric characters allowed <br />\n";
    
  }     
  return $error;
}


function contains($password, $validChars){

  //$newarr[] = explode("",$password);
  for($i =0; $i < strlen($password); $i++) {
     $charac = $password[$i];
    foreach($validChars as $j => $bad ) {
    if ($charac == $bad) {
      return 1;
    } }
  }
  return 0;
}
?>