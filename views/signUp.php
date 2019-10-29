
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
btn.onclick=function(){
	console.log("Entering signUp")
	document.getElementById('signUp').style.display='block';
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
      <select>
      <option value"user">User</option>
      <option value"dealer">Dealer</option>
      </select>
      <label for="fName"><b>First Name</b></label>
      <input type="text" placeholder="Enter firstName" name="fName"  required>
      <label for="lName"><b>Last Name</b></label>
      <input type="text" placeholder="Enter lastName" name="lName" required>
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email_signUp" id="email_signUp" required>
      <label for="pNumber"><b>Phone Number</b></label>
      <input type="tel" placeholder="Enter Phone Number" name="pNumber" id="pNumber" required>
      <label for="address"><b>Address</b></label>
      <input type="text" placeholder="Enter Address" name="address" required>
      <label for="pCode"><b>Postal Code</b></label>
      <input type="text" placeholder="XXX XXX" name="pCode" id="pCode" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw_signUp" id="psw_signUp" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw_repeat_signUp" id="psw_repeat_signUp" required>
      <button type="submit" id="submit"  name="submitSU" class="signup">Sign Up</button>

      
       <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('signUp').style.display='none'" class="cancelbtn">Cancel</button>
     <!--  <span id="signIn_page"> SignIn</span>-->
    </div>
      
    </div>
  </form>
</div>
<?php
 
//include ("./model/dbConn.php");
//include ("./model/auth.php");
  //require "./model/dbConn.php";
  // include ("./inc/Utility/auth.php");
  
require_once  ("./inc/Entities/User.class.php");
require_once  ("./inc/Utility/auth.php");
  if(isset($_POST['submitSU']))
  {
	
    if(!empty($_POST['email_signUp']) && !empty($_POST['psw_signUp']) && !empty($_POST['psw_repeat_signUp']))
  	{
      echo "entering................";
      $auth=new Auth("User"); 
		echo $isMatch=auth::matchPass($_POST['psw_signUp'],$_POST['psw_repeat_signUp']);
    echo "signUp with ".$_POST['email_signUp'];

  
		if($isMatch==0)
		{
		$user=new User();
    $user->setData($_POST['fName'],"Jattana",$_POST['email_signUp'],$_POST['psw_signUp'],"784","134st 9538","V3v 5s5");
    //  initialize     
    $auth::initialize("USer");
		$auth::add_user($user,"User");
		}
	}
}
  ?>