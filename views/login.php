<!-- Sign In modal  -->
<script>
  // Get the modal
  var modal = document.getElementById('login_div');
  var btn = document.getElementById('login_page');
  if (btn != null) {
    btn.onclick = function() {
      document.getElementById('login_div').style.display = 'block';
    }
  }
</script>

<!-- The Modal -->
<div id="login_div" class="modal">

  <!-- Modal Content  -->
  <!-- action="http://localhost/index.php" -->
  <form class="modal-content animate" action="http://localhost/views/signUp_Login.php" method="post">


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


    <button type="submit" id="submit" name="submit">Login</button>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('login_div').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>

</div>