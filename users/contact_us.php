<?php
// include ("./views/header.php");
// include("./views/signUp.php");
// include("./views/login.php");
// require_once  ("inc/Utility/db.php");
// require_once  ("inc/Entities/ContactUs.class.php");

require_once("../requireFiles.php");

?>
	<article class="contact-us-outer">
	<div class="contact_div">
		<h3>Contact Us</h3>
		<form class="contact_form" action="contact_us.php" method="POST"> 
		<select name="company_name">
		   <option value="admin">Tiffin House Service (Admin)</option>
			<option value="happy">Happy</option>
		</select><br>
		<!--<label for="cfName">First Name:</label>-->
		<input type="text" name="fName_cu" placeholder="Enter FirstName"/><br>
		<!--<label for="cLName">Last Name:</label>-->
		<input type="text" name="lName_cu" placeholder="Enter LastName"/><br>
		<!--<label for="cEmail">Email:</label>-->
		<input type="email" name="email_cu" placeholder="Enter Email"/><br>
		<!--<label for="cMessage">Message:</label>-->
		<textarea id="cMessage" name="message_cu"  rows="8" placeholder="Enter Message"></textarea><br>
		<button type="submit" name="submit_message" id="sendBtn_cu">Send</button> 
		<button type="reset" id="refresh_cu">Reset</button>
		</form>
	</div>
	<div class="map_div">

<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5216.367599132806!2d-122.8565822!3d49.1780988!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5485d9c59a94af2b%3A0x8e247b4d8dce9540!2s9538%20134%20St%2C%20Surrey%2C%20BC%20V3V%205S5!5e0!3m2!1sen!2sca!4v1569307505559!5m2!1sen!2sca" width="600" height="430" frameborder="0" style="border:1px solid black;" allowfullscreen=""></iframe></div>
	
	</article>
	<?php
	if(isset($_POST['submit_message']))
	{
		extract($_REQUEST);  
		$db=new database();
		$db::initialize("ContactUs");
		// $now = new DateTime();
        // echo $now->format('Y-m-d H:i:s'); 
		$date=date('Y-m-d H:i:s');
		echo $date;
		$contactUs=new ContactUs();
		$contactUs->setData($_POST['company_name'],$_POST['fName_cu'],$_POST['lName_cu'],$_POST['email_cu'],
		$_POST['message_cu'],date('Y-m-d H:i:s'));
		$message=$db::sendMessage($contactUs);
	}
	
	?>
	
<!--Footer-->
<?php
include ("../views/footer.php")
?>





