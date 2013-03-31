<?php
//insert
//insert
  $hostname=$_ENV['OPENSHIFT_MYSQL_DB_HOST'];
  $port=$_ENV['OPENSHIFT_MYSQL_DB_PORT'];
  $username='adminX8efWX5';
  $password='v4Z1h8Kcp5QI';
  $database='alumweb';
  $connString = "mysql:host=$hostname;port=$port;dbname=alumweb";
try{
      
    $dbh = new PDO($connString,$username,$password);
}

catch(PDOException $e){
  
    echo "CONNECTION ERROR!!!! : ".$e->GetMessage();

} 
?>

