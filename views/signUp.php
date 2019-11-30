<?php ob_start(); ?>
<script>
  // Get the modal
  var modal = document.getElementById('signUp');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  var btn = document.getElementById('signUp_page');
  if (btn != null) {
    btn.onclick = function() {
      console.log("Entering signUp")
      document.getElementById('signUp').style.display = 'block';
    }
  }
</script>
<!-- The Modal (contains the Sign Up form) -->
<div id="signUp" class="modal">
  <span onclick="document.getElementById('signUp').style.display='none'" class="close" title="Close Modal"></span>
  <!-- Sign Up Form with required validation   -->
  <form class="modal-content" method="post" id="signUp_form" action="http://localhost/views/signUp_Login.php">
    <div class="container">
      <h1>Sign Up</h1>
      <p class="msg">Please fill in this form to create an account.</p>
      <hr>
      <select id="user_type_signUp" name="user_type_signUp">
        <option value="user">User</option>
        <option value="dealer">Dealer</option>
      </select>
      <p id="signUp_row">
        <label for="fName"><b>First Name</b></label>
        <input type="text" placeholder="Enter firstName" name="fName" required>
      </p>
      <p id="signUp_row">
        <label for="lName"><b>Last Name</b></label>
        <input type="text" placeholder="Enter lastName" name="lName" required>
      </p>
      <p id="signUp_row">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email_signUp" id="email_signUp" required>
      </p>
      <p id="signUp_row">
        <label for="pNumber"><b>Phone Number</b></label>
        <input type="tel" placeholder="Enter Phone Number" name="pNumber" id="pNumber" required>
      </p>
      <p id="signUp_row">
        <label for="address"><b>Address</b></label>
        <input type="text" placeholder="Enter Address" name="address" required>
      </p>
      <p id="signUp_row">
        <label for="pCode"><b>Postal Code</b></label>
        <input type="text" placeholder="XXX XXX" name="pCode" id="p_Code" required>
      </p>
      <p id="signUp_row">

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw_signUp" id="psw_signUp" required>
      </p>
      <p id="signUp_row">

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw_repeat_signUp" id="psw_repeat_signUp" required>
      </p>
      <p id="compName">
        <label for="comp_Name"><b>Company Name</b></label>
        <input type="text" placeholder="Enter your company name" name="company_name" id="comp_Name"></p>
      <p class="submitBtn">
        <button type="submit" id="submit_signUp" name="submitSU" class="signup">Sign Up</button></p>


      <div style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('signUp').style.display='none'" class="cancelbtn">Cancel</button>
        <!--  <span id="signIn_page"> SignIn</span>-->
      </div>

    </div>
  </form>
  <!-- scripts for jquery cdn and second one is for validation of signUp form-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="../inc/controller/signUp_validation.js"> </script>
</div>