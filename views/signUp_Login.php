<?php
require_once  ("../inc/Entities/Dealer.class.php");
require_once  ("../inc/Entities/User.class.php");
require_once  ("../inc/Entities/Menu.class.php");
require_once  ("../inc/Entities/CompanyProfile.class.php");
require_once ("../inc/Utility/auth.php");
require_once ("../inc/Utility/db.php");
require_once ("../inc/Utility/PDOAgent.class.php");

if(isset($_POST['submitSU']))
{  
  if($_POST['user_type_signUp']=='dealer')
    {
    $auth=new Auth("Dealer"); 
  echo "signUp with ".$_POST['email_signUp'];

      $dealer=new Dealer();
  $dealer->setData($_POST['fName'],$_POST['lName'],$_POST['email_signUp'],$_POST['psw_signUp'],$_POST['pNumber'],$_POST['address'],$_POST['pCode']);
  $dealer->setCompanyName($_POST['company_name']);
  //  initialize     
  $auth::initialize("Dealer");
      $auth::add_dealer($dealer,"Dealer");
  }else{
  
  $auth=new Auth("User"); 
  echo "signUp with ".$_POST['email_signUp'];

      $user=new User();
  $user->setData($_POST['fName'],$_POST['lName'],$_POST['email_signUp'],$_POST['psw_signUp'],$_POST['pNumber'],$_POST['address'],$_POST['pCode']);
  //  initialize     
  $auth::initialize("User");
  $res=$auth::add_user($user,"User");
  if($res==-1)
  {
      echo "<script>alert('User Already Exists');</script>";
  }else{
    echo "<script>alert('User added successfully!');</script>";   
    header('Location: http://localhost/index.php');
  }

}
}
?>