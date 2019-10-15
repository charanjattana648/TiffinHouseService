<?php
$serverName="localhost";
$userName="root";
$password="";
$dbName="TiffinHouseDb";

try{
	
	$dbConn=new PDO("mysql:host=$serverName;dbName=$dbName",$userName,$password);
	$dbConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	echo "Connection is successfull.";
}catch(PDOException $e){
	
	echo $e->getMessage();
}

?>