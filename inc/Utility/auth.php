<?php
// include ("../Entities/User.class.php");
//require_once  ("inc/Entities/Dealer.class.php");
require_once ("PDOAgent.class.php");
class Auth{
	private static $db;	

	public static function initialize(string $className)
	{
		self::$db=new PDOAgent($className);
	}
/**
* 
* @param undefined $new_user  add user's information in user table
* @param undefined $type type of user(dealer,user)
* 
* @return user id
*/
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
		$e->getMessage();
		return -1;
	}	
}

/**
* 
* @param undefined $new_dealer add dealer's information in dealer table
* @param undefined $type check type of user(user,dealer)
* 
* @return dealers id
*/
public static function add_dealer(Dealer $new_dealer,string $type)
{
	$insert_user_query="INSERT INTO TiffinHouseDb.$type(firstName,lastName,userEmail,password,phoneNumber,address,postalCode,companyName, isVerified) 
	VALUES(:userfirstName,:user_lastName,:user_email,:user_pass,:user_phoneNUmber,:user_address,:user_postalCode,:companyName,:isVerified)";

	try{
		self::$db->query($insert_user_query);
		self::$db->bind(':userfirstName',$new_dealer->getFirstName());
		self::$db->bind(':user_lastName',$new_dealer->getLastName());
		self::$db->bind(':user_email',$new_dealer->getUserEmail());
		self::$db->bind(':user_pass',$new_dealer->getPassword());
		self::$db->bind(':user_phoneNUmber',$new_dealer->getPhoneNumber());
		self::$db->bind(':user_address',$new_dealer->getAddress());
		self::$db->bind(':user_postalCode',$new_dealer->getPostalCode());
		self::$db->bind(':companyName',$new_dealer->getCompanyName());
		self::$db->bind(':isVerified',$new_dealer->getIsVerified());
		self::$db->execute();
		$userId=self::$db->lastInsertedId();
		print "Inserted user $userId successfully!";
		return($userId);
	}catch(PDOException $e)
	{
		echo $e->getMessage();
	}	
}
/**
* 
* @param undefined $userEmail match useremail
* @param undefined $pass  match password of user
* @param undefined $type  check type(dealer or user) for signin
* 
* @return user data
*/

public static function signIn_user($userEmail,$pass,$type) 
{	
	$get_user_query="SELECT * FROM TiffinHouseDb.$type WHERE userEmail=:userEmail and password=:psw";

	try{
		//echo "<br>type is ".$type;
		self::$db->query($get_user_query);		
		self::$db->bind(":userEmail",$userEmail);
		self::$db->bind(":psw",$pass);
		self::$db->execute();
		//$user_data=new Dealer();
		$user_data=self::$db->singleResult();	
		//var_dump($user_data);
		return($user_data);
	}catch(PDOException $e)
	{
		echo $e->getMessage();
	}	
}
}
?>