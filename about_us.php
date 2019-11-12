<!DOCTYPE html>
<?php
include ("./views/header.php");
include("./views/signUp.php");
include("./views/login.php");
require_once  ("./inc/Entities/AboutUs.class.php");
require_once ("./inc/Utility/db.php");
require_once ("./inc/Utility/PDOAgent.class.php");
?>
	<!--div for slider-->
	<?php 
	$db=new database();
	// $aboutUs=new AboutUs();	
	$db::initialize("AboutUs");	
	$aboutUs=$db::getAboutCompany("Admin");
	
	?>
	<!--div for paragraph-->
	<div class="about-us-outer">
	<div class="about_us">	
	<h1>About Us</h1>	
	<?php 
	 $aboutCompany=$aboutUs[0]->getAboutCompany(); 
		  $about_us=explode("\n",$aboutCompany);
		  foreach($about_us as $about)
		  {
			  echo "<p>".$about."</p>";
		  }
	?>
	</div>
		</div>
	<div id="company_message_outer">
		  <?php		 
		   $aboutUs=$db::getAboutCompany(); 
		   foreach($aboutUs as $about)
		   {
			   if($about->getCompanyName()!="Admin")
			   {
				   echo '<div class="comp_message_inner">	
				   <h1>'.$about->getCompanyName().'</h1>
				   <p>'.$about->getAboutCompany().'</p>
				   </div>';
			   }			  
		   }
		  ?>

	</div>


	
<!--Footer-->
<?php
include ("./views/footer.php")
?>