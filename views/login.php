<script>
// Get the modal
var modal = document.getElementById('login_div');

// When the user clicks anywhere outside of the modal, close it
/*window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}*/
var btn=document.getElementById('login_page');
if(btn!=null)
{	
btn.onclick=function(){
	document.getElementById('login_div').style.display='block';
}	
}
		</script>
	<!--
	<button onclick="document.getElementById('id01').style.display='block'">Login</button>-->

<!-- The Modal -->
<div id="login_div" class="modal">
 <!-- <span onclick="document.getElementById('login_div').style.display='none'" class="close" title="Close Modal">&times;</span>-->

  <!-- Modal Content -->
  <form class="modal-content animate" action="" method="post">
    

    <div class="container">
     <h1>Sign In</h1>
      <p>Please fill in this form to sign In.</p>
      <hr>
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname_login" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw_login" required>
<!--
      <button type="submit" id="submitL"  name="submitL">Login</button>-->
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