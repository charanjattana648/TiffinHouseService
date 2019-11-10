<?php
require_once("inc/config.inc.php");
include ("./views/header.php");
include("./views/signUp.php");
include("./views/login.php");
require_once ("./inc/Utility/auth.php");
require_once  ("inc/Entities/User.class.php");
require_once  ("./inc/Entities/Menu.class.php");
require_once ("./inc/Utility/db.php");
require_once ("./inc/Utility/PDOAgent.class.php");
?>
<h1><?php echo "Company Name" ?></h1>
<h2 style="text-align:center">Subscribe your Plan</h2>

<div class="card">
  <img src="./images/mini.jpg" alt="Denim Jeans" style="width:100%" >
  <h1>Small Tiffin</h1>
  <p class="price">$55.99</p>
  
  <p>Small Tiffin with Subscription is a great meal option for a single person.  Make a selection of 5 dishes or flexible combos and mix-match from our weekly menu. Delivered every week automatically until you cancel or suspend.
This is a weekly subscription plan.</p>
  <label for="tiff_qty">Quantity</label>
 <input type="number" name="tiffin_qty" id="tiff_qty" min="1" value="1"/>
  <p><button>Add to Cart</button></p>
</div>
<div class="card">
  <img src="./images/medium.jpg" alt="Denim Jeans" style="width:100%">
  <h1>medium Tiffin</h1>
  <p class="price">$75.99</p>
  <p>Medium Tiffin with Subscription is a great meal option for a person or group , make a selection of 7 dishes or flexible combos and mix-match from our weekly menu. Delivered every week automatically until you cancel or suspend.</p>
  <p><button>Add to Cart</button></p>
</div>
<div class="card">
  <img src="./images/large.jpg" alt="Denim Jeans" style="width:100%">
  <h1>Family Tiffin</h1>
  <p class="price">$95.99</p>
  <p>Large Tiffin Meal Subscription is a great meal option for a person or group , make a selection of 9 dishes or flexible combos and mix-match from our weekly menu. Delivered every week automatically until you cancel or suspend.</p>
  <p><button>Add to Cart</button></p>
</div>


<?php
include ("./views/footer.php");
?>