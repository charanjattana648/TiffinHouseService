<?php
ob_start();
require_once("../requireFiles.php");

?>
	<article class="contact-us-outer">
	<div class="contact_div">
		<h3>Contact Us</h3>
		<form class="contact_form" action="contact_us_savedata.php" method="POST"> 
		<select class="company_name_select" name="company_name">
		   <option value="admin">Tiffin House Service (Admin)</option>
			<option value="happy">Happy</option>
			<option value="Hunger Feed">Hunger Feed</option>
			<option value="Tasty Tiffin">Tasty Tiffin</option>
		</select><br>
		<input type="text" name="fName_cu" placeholder="Enter FirstName" /><br>
		<input type="text" name="lName_cu" placeholder="Enter LastName"/><br>
		<input type="email" id="email_cu" name="email_cu" placeholder="Enter Email" required/><br>
		<textarea id="cMessage" name="message_cu"  rows="8" placeholder="Enter Message" required></textarea><br>
		<button type="submit" name="submit_message" id="sendBtn_cu">Send</button> 
		<button type="reset" id="refresh_cu">Reset</button>
		</form>
	</div>
	<div class="map_div">

<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5216.367599132806!2d-122.8565822!3d49.1780988!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5485d9c59a94af2b%3A0x8e247b4d8dce9540!2s9538%20134%20St%2C%20Surrey%2C%20BC%20V3V%205S5!5e0!3m2!1sen!2sca!4v1569307505559!5m2!1sen!2sca" width="600" height="430" frameborder="0" style="border:1px solid black;" allowfullscreen=""></iframe></div>
	
	</article>

	
<!--Footer-->
<?php
include ("../views/footer.php")
?>





