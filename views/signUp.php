
<script>
// Get the modal
var modal = document.getElementById('signUp');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
var btn=document.getElementById('signUp_page');
if(btn!=null)
{	
btn.onclick=function(){
	console.log("Entering signUp")
	document.getElementById('signUp').style.display='block';
}
}

/*var btn=document.getElementById('signIn_page');
btn.onclick=function(){
	console.log("Entering signIn")
	document.getElementById('signUp').style.display='none';
	
	document.getElementById('signIn').style.display='none';
}*/


    </script>
<!-- The Modal (contains the Sign Up form) -->
<div id="signUp" class="modal">
  <span onclick="document.getElementById('signUp').style.display='none'" class="close" title="Close Modal"></span>
  
  <form class="modal-content" method="post" action="index.php">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <select id="user_type_signUp" name="user_type_signUp">
      <option value="user">User</option>
      <option value="dealer">Dealer</option>
      </select>
      <p id="signUp_row">
      <label for="fName"><b>First Name</b></label><br>
      <input type="text" placeholder="Enter firstName" name="fName"  required>
      </p>  <p id="signUp_row">
      <label for="lName"><b>Last Name</b></label><br>
      <input type="text" placeholder="Enter lastName" name="lName" required>
      </p>  <p id="signUp_row">
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email_signUp" id="email_signUp" required>
      </p>  <p id="signUp_row">
      <label for="pNumber"><b>Phone Number</b></label>
      <input type="tel" placeholder="Enter Phone Number" name="pNumber" id="pNumber" required>
      </p>  <p id="signUp_row">
      <label for="address"><b>Address</b></label>
      <input type="text" placeholder="Enter Address" name="address" required>
      </p>  <p id="signUp_row">
      <label for="pCode"><b>Postal Code</b></label>
      <input type="text" placeholder="XXX XXX" name="pCode" id="pCode" required>
      </p>  <p id="signUp_row">

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw_signUp" id="psw_signUp" required>
      </p>  <p id="signUp_row">

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw_repeat_signUp" id="psw_repeat_signUp" required>
      </p><p  id="compName">
      <label for="comp_Name"><b>Company Name</b></label>
      <input type="text" placeholder="Enter your company name" name="company_name" id="comp_Name" required>
      <p>
      <button type="submit" id="submit_signUp"  name="submitSU" class="signup">Sign Up</button>

      
       <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('signUp').style.display='none'" class="cancelbtn">Cancel</button>
     <!--  <span id="signIn_page"> SignIn</span>-->
    </div>
      
    </div>
  </form>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="../inc/controller/signUp_validation.js"> </script>
</div>
<?php
 
//include ("./model/dbConn.php");
//include ("./model/auth.php");
  //require "./model/dbConn.php";
  // include ("./inc/Utility/auth.php");
  
require_once  ("./inc/Entities/User.class.php");
require_once  ("./inc/Entities/Dealer.class.php");
require_once  ("./inc/Utility/auth.php");
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
		$auth::add_user($user,"User");

  }
}
  ?>