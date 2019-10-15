<?php
include ("dbConn.php");

function add_user($userName,$pass)
{	global $dbConn;
echo $userName." in auth with psw as : ".$pass;
	
	$insert_user_query="INSERT INTO TiffinHouseDb.USER(userName,password) VALUES(:user_name,:user_pass)";
	try{
		$insert_user=$dbConn->prepare($insert_user_query);
		$insert_user->bindValue(':user_name',$userName);
		$insert_user->bindValue(':user_pass',$pass);
		$insert_user->execute();
		$insert_user->closeCursor();
		$userId=$dbConn->lastInsertId();
		print "Inserted user $userId successfully!";
		return($userId);
	}catch(PDOException $e)
	{
		
		echo "error..............";
		echo $e->getMessage();
	}	
}

function match($pass,$pass_repeat)
{
	echo $pass." -- in match";
	return 	strcmp($pass,$pass_repeat);
}

function signIn_user($userName,$pass)
{	
global $dbConn;
echo $userName." in auth with psw as : ".$pass;
	
	$get_user_query="SELECT * FROM TiffinHouseDb.USER WHERE userName='$userName'";
	try{
		$get_user=$dbConn->prepare($get_user_query);
		$get_user->execute();
		$user_data=$get_user->FETCHALL(PDO::FETCH_ASSOC);
		$get_user->closeCursor();
		
		return($user_data);
	}catch(PDOException $e)
	{
		echo "error..............";
		echo $e->getMessage();
	}	
}

?>