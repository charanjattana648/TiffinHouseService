<?php
// include ("../Entities/User.class.php");
require_once ("PDOAgent.class.php");
class Auth{
	private static $db;	

	public static function initialize(string $className)
	{
		self::$db=new PDOAgent($className);
	}

public static function add_user(User $new_user,string $type)
{
	$insert_user_query="INSERT INTO TiffinHouseDb.USER(firstName,lastName,userEmail,password,phoneNumber,address,postalCode) 
	VALUES(:userfirstName,:user_lastName,:user_email,:user_pass,:user_phoneNUmber,:user_address,:user_postalCode)";

	try{
		self::$db->query($insert_user_query);
		self::$db->bind(':userfirstName',$new_user->getFirstName());
		self::$db->bind(':user_lastName',$new_user->getLastName());
		self::$db->bind(':user_email',$new_user->getUserEmail());
		self::$db->bind(':user_pass',$new_user->getPassword());
		self::$db->bind(':user_phoneNUmber',$new_user->getPhoneNumber());
		self::$db->bind(':user_address',$new_user->getAddress());
		self::$db->bind(':user_postalCode',$new_user->getPostalCode());
		self::$db->execute();
		$userId=self::$db->lastInsertedId();
		print "Inserted user $userId successfully!";
		return($userId);
	}catch(PDOException $e)
	{
		echo $e->getMessage();
	}	
}

public static function matchPass($pass,$pass_repeat)
{
	return 	strcmp($pass,$pass_repeat);
}

public static function signIn_user($userEmail,$pass,$type) 
{	
	$get_user_query="SELECT * FROM TiffinHouseDb.$type WHERE userEmail=:userEmail and password=:psw";

	try{
		self::$db->query($get_user_query);		
		self::$db->bind(":userEmail",$userEmail);
		self::$db->bind(":psw",$pass);
		self::$db->execute();
		$user_data=self::$db->singleResult();	
		return($user_data);
	}catch(PDOException $e)
	{
		echo $e->getMessage();
	}	
}
}
?>