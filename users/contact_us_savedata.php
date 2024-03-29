	<?php
	require_once("../requireFiles.php");
	/**used to pass contact us data filled by user to database */
	if (isset($_POST['submit_message'])) {
		echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>';
		echo '<script src="../inc/controller/contact_us.js"></script>';
		extract($_REQUEST);
		$db = new database();
		$db::initialize("ContactUs");
		$date = date('Y-m-d H:i:s');
		$contactUs = new ContactUs();
		$contactUs->setData(
			$_POST['company_name'],
			$_POST['fName_cu'],
			$_POST['lName_cu'],
			$_POST['email_cu'],
			$_POST['message_cu'],
			date('Y-m-d H:i:s')
		);
		$message = $db::sendMessage($contactUs);
		header("Location: http://localhost/users/contact_us.php");
	}

	?>