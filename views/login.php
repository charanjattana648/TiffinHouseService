
<script>
// Get the modal
var modal = document.getElementById('login_div');
var btn=document.getElementById('login_page');
if(btn!=null)
{	
btn.onclick=function(){
	document.getElementById('login_div').style.display='block';
}	
}
		</script>

<!-- The Modal -->
<div id="login_div" class="modal">

  <!-- Modal Content -->
  <form class="modal-content animate" action="http://localhost/index.php" method="post">
    

    <div class="container">
     <h1>Sign In</h1>
      <p>Please fill in this form to sign In.</p>
      <hr>
      <select name="userType" id="user_type_signIn">
      <option value="user">User</option>
      <option value="dealer">Dealer</option>
      <option value="admin">Admin</option>
      </select>
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname_login" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw_login" required>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>
    
  
      <button type="submit" id="submit"  name="submit">Login</button>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('login_div').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
  
</div>
<?php
  if(isset($_POST['submit']))
  {
  	extract($_REQUEST);  
  	if(!empty($_POST['uname_login']) && !empty($_POST['psw_login']))
  	{
    $auth=new Auth();
    $users="";
    if($_POST['userType']=="dealer")
    {
     // echo "dealer";
      $auth::initialize("Dealer");
      $users=$auth::signIn_user($_POST['uname_login'],$_POST['psw_login'],"dealer");
    }else if($_POST['userType']=="user"){
     // echo "user";
      $auth::initialize("User");
      $users=$auth::signIn_user($_POST['uname_login'],$_POST['psw_login'],"user");
    }else{

    }
 
    $refresh=false;   
    if($users!="")
		{
    $_SESSION['User_type']=$_POST['userType'];
    $_SESSION['user_Name']=$users->getUserEmail();
    $_SESSION['loggedIn']=true;   
    if($_POST['userType']=="dealer")
    {
      echo $users->getCompanyName();
      $_SESSION['company_name']=$users->getCompanyName();
    }     
    header("Location: http://localhost/index.php");
    //$page = $_SERVER['PHP_SELF'];
    if( $refresh==false)
    {
     // echo "<script>history.go(0);</script>";
      $refresh=true;
    }
    
		}else{
      $_SESSION['loggedIn']=false;
			echo "<script>alert('please enter valid email and password');</script>";
		}
	}
	
  
  }
  ?>