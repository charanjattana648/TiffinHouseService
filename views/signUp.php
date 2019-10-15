
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
  <form class="modal-content" method="post" action="">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email_signUp" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw_signUp" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw_repeat_signUp" required>
      <button type="submit" id="submit"  name="submit" class="signup">Sign Up</button>

      
       <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('signUp').style.display='none'" class="cancelbtn">Cancel</button>
     <!--  <span id="signIn_page"> SignIn</span>-->
    </div>
      
    </div>
  </form>
</div>