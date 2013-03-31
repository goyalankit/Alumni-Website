<?php
//insert
//insert
  $hostname='localhost';
  $username='root';
  $password='MyNewPass';
  $database='website';
  $connString = "mysql:host=$hostname;dbname=website";
try{
      
    $dbh = new PDO($connString,$username,$password);
}

catch(PDOException $e){
  
    echo "CONNECTION ERROR!!!! : ".$e->GetMessage();

} 
?>

