<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="../css/style.css"/>		
		<link rel="stylesheet" href="css/font-awesome.min.css"/>
		<link rel="stylesheet" href="../css/index.css"/>
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	</head>
	<body>
	
	<header>
		<div class="head_top"><div class="logo"><img src="images/logoItm.jpg" height="100px" width="140px"/></div>
			<div class="title"><h1>Tiffin House Service</h1></div></div>
			<div class="head_bottom"><nav><ul>
			<li><a href="index.php" >Home</a></li>
			<li><a href="menu.php" >Menu</a></li>
			<li><a href="" >Order</a></li>
			<li><a href="about_us.php" >About us</a></li>			
			<li><a href="contact_us.php" >Contact us</a></li>
			<?php  if($_SESSION['loggedIn']=='true')
			{
			    echo  '<li ><span onclick="logout()" name="logout_btn" id="logout_btn">Logout</span></li>';
			}else{
				echo '<li ><span id="login_page">Login</span></li>
				      <li ><span id="signUp_page">SignUp</span></li>';
			}

			?>
			<?php
			function logout()
			{
				$_SESSION['loggedIn']=false;
			}
			?>
		
			</ul></nav></div>
	</header>
