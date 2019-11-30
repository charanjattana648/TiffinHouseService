<?php

/** session_start() method starts the session now we can store data in sessions */
session_start();
?>
<?php
/***these are all the files that index page will need to complete the task */
require_once("inc/config.inc.php");
require_once("inc/Entities/Dealer.class.php");
require_once("inc/Entities/User.class.php");
require_once("./inc/Entities/Menu.class.php");
require_once("./inc/Entities/CompanyProfile.class.php");
require_once("./inc/Utility/auth.php");
require_once("./inc/Utility/db.php");
require_once("./inc/Utility/PDOAgent.class.php");
include("./views/header.php");
include("./views/signUp.php");
include("./views/login.php");

?>
<h2 id="tdeals_head">Today's Deals</h2>
<!-- Slideshow container -->
<div class="dailyDeals_slideshow">

	<!-- Full-width images with number and caption text -->
	<?php
	/** this is a slider which will go through all the deals with 5 sec time interval */
	$db = new database();
	$db::initialize("Menu");
	$menu = $db::getMeal();
	$i = 1;
	$count = count($menu);
	foreach ($menu as $dailyOffer) {
		$itemName = preg_replace('/\s/', '_', $dailyOffer->getItemName());
		echo '<div class="today_deals_slides fade">
		<div class="numbertext">' . $i . ' / ' . $count . '</div>
		<img src="data:image/jpg;base64,' . base64_encode($dailyOffer->getItemImage()) . '"/>
		 <div class="tdeal_details"><p class="tdeal_price">$' . $dailyOffer->getItemPrice() . '</p>
		<p class="tdeal_name" id="' . $dailyOffer->getCompanyName() . '">' . $dailyOffer->getItemName() . '</p>
		   <div><button class="do_item" id="order_' . $itemName . '">Order Now</button></div>
		</div>
	  </div>';
	}
	echo '</div>';

	echo '<script src="./inc/Utility/index.js"></script>'
	?>




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

	<script src="../inc/controller/dailyDeals.js"></script>

	<!-- The dots/circles -->
	<div style="text-align:center">
		<span class="dot" onclick="currentSlide(1)"></span>
		<span class="dot" onclick="currentSlide(2)"></span>
		<span class="dot" onclick="currentSlide(3)"></span>
	</div>

	<h2 id="sel_delearHead">Select a Dealer</h2>


	<div class="dealers_div">
		<?php
		/** this will fetch and show the all the dealers added in the database with their name and image*/
		$db = new database();
		$db::initialize("CompanyProfile");
		$companies_Detail = $db::getCompanyDetail();
		foreach ($companies_Detail as $com_detail) {
			$itemName = preg_replace('/\s/', '', $com_detail->getCompanyName());
			echo '<article class="dealer_article">
		<div class="dealer_imageM">
		<a href="./users/MealPlan.php?cname=' . $com_detail->getCompanyName() . '" id="' . $itemName . '"><img src="data:image/jpg;base64,' . base64_encode($com_detail->getCompanyImage()) . '"/> </a>
   		</div>
		<div class="dealer_selMenu">
		<h2>' . $com_detail->getCompanyName() . '</h2>		
		</div>
		<div></div>
	</article>';
		}

		?>

	</div>


	<?php
	/** this will add footer */
	include("./views/footer.php")
	?>