<?php

require_once("inc/config.inc.php");
include ("./views/header.php");
include("./views/signUp.php");
include("./views/login.php");
require_once ("./inc/Utility/auth.php");
require_once  ("inc/Entities/User.class.php");

require_once ("./inc/Utility/PDOAgent.class.php");
//require_once ("./inc/config.inc.php");
?>
	<h2 id="tdeals_head">Today's Deals</h2>
	<!-- Slideshow container -->
<div class="dailyDeals_slideshow">

  <!-- Full-width images with number and caption text -->
  <div class="today_deals_slides fade">
    <div class="numbertext">1 / 3</div>
    <img src="images/chole-recipe-step-by-step-instructions-13.jpg" >
     <div class="tdeal_details"><p class="tdeal_price">$15</p>
    <p class="tdeal_name">Chole Bature</p>
       <div><button id="tdeals_order">Order Now</button></div>
    </div> 
    
 
  </div>

  <!--<div class="today_deals_slides fade">
    <div class="numbertext">2 / 3</div>
    <img src="images/IMG_20150316_064733_2.jpg" >  
        <div class="tdeal_details" ><p class="tdeal_price">$15</p>
    <p class="tdeal_name">Mix Veg</p></div> 
    <div><button id="tdeals_order">Order Now</button></div>
  </div>

  <div class="today_deals_slides fade">
    <div class="numbertext">3 / 3</div>
    <img src="images/Methi-Malai-Matar.jpg" >
     <div class="tdeal_details"><p class="tdeal_price">$15</p>
    <p class="tdeal_name">Malai Matar</p></div>
    <div><button id="tdeals_order">Order Now</button></div>
  </div>-->

  <!-- Next and previous buttons 
  
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
  -->
</div>
<br>
<script src="dailyDeals.js"></script>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>

<h2 id="sel_delearHead">Select a Dealer</h2>

<div class="dealers_div">
<article class="dealer_article">
     <!--button-->
	<div class="dealer_imageM">
		<img src="images/Happy_tiffin.png"/>
	</div>
	<!--button-->
	<div class="dealer_selMenu">
		<h2>Apna Tiffin</h2>
	</div>
	<!--button div -->
	<div></div>
</article>
<article class="dealer_article">
     <!--button-->
	<div class="dealer_imageM">
		<img src="images/punjabiTiffDealer.png"/>
	</div>
	<!--button-->
	<div class="dealer_selMenu"><h2>Guri Tiffin</h2></div>
	<!--button div -->
	<div></div>
</article>
<article class="dealer_article">
     <!--button-->
	<div class="dealer_imageM">
		<img src="images/tiffdeal3.png"/>
	</div>
	<!--button-->
	<div class="dealer_selMenu">
		<h2>Happy Tiffin</h2>
	</div>
	<!--button div -->
	<div></div>
</article>
</div>


 

<!--	<section class="body">
	<div class="login_div">
	<img src="images/photo-1470549813517-2fa741d25c92.jpg" />

	<h2>Sign In</h2>
		<form class="login_form">
		
			<label for="login_Pass">UserName : </label>
			<input type="text" /><br>
			<label for="login_Pass">Password : </label>
			<input id="login_Pass" type="password"/><br><br>
			<button name="signIn">Sign In</button>
			<button name="signUp">Sign Up</button>
		</form>
	</div>
	</section>-->
	<div>
	<h1> Don't Know how to Order? Follow easy three steps. </h1>
	<ul>
		<li>
		Create an Account.
		</li>
		<li>
			Choose your Meal
		</li>
		<li>
			Just order.
		</li>
	</ul>	
	</div>
<!--Footer-->
<?php
include ("./views/footer.php")
?>