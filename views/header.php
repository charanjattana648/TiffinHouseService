<?php
//session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="../css/style.css"/>		
		<link rel="stylesheet" href="../css/font-awesome.min.css"/>
		<link rel="stylesheet" href="../css/index.css"/>
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head>
	<body>
	
	<header>
		<div class="top_head">
			<ul>
			<?php			
			function logout_fn()
			{
				$_SESSION['loggedIn']=false;
				$_SESSION['User_type']="";
				$_SESSION['user_Name']="";
				$_SESSION['company_name']="";
				$page = $_SERVER['PHP_SELF'];
				//header("Location: ".$page);
			}

			if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']=='true')
			{
				?>
			   <!-- <li ><span  name="logout_btn" id="logout_btn">Logout</span></li> -->
			   <li><a href="?logout_me" >Logout</a></li>
			   <?php
			}else{
					 echo' <li ><span id="login_page">Login</span></li>
				      <li ><span id="signUp_page">SignUp</span></li>';
			 }

			 if(isset($_GET['logout_me']))
			 {
				logout_fn();
			 }
			?>
			</ul>
		</div>
		<div class="head_top"><div class="logo"><img src="../images/logoItm.jpg" height="100px" width="140px"/></div>
			<div class="title"><h1>Tiffin House Service</h1></div></div>
			<div class="head_bottom"><nav><ul>
			<li><a href="../index.php" >Home</a></li>
			<?php
			if(isset($_SESSION['User_type']) && ($_SESSION['User_type']=="dealer" || $_SESSION['User_type']=="admin"))
			{
			?>
			<li><a href="http://localhost/dealers/menu_dealer.php" >Menu</a></li>
			 
			<li><a href="http://localhost/dealers/menu_order.php" >Order</a></li>
			<li><a href="http://localhost/dealers/about_us_dealer.php" >About us</a>
			
			</li>			
			<li><a href="http://localhost/dealers/contact_us_dealer.php" >Contact us</a></li>
			<li><a href="http://localhost/dealers/companyProfile.php" >Company Profile</a></li>
			<?php }else{

				$db=new database();
				$db::initialize("Menu");
				$companiesName=$db->getMealCompanyNames();
				//echo $x;
			echo '<li class="menuUser"><a id="menu_ul" href="">Menu</a>
			
				<ul class="menuHover">';
				//var_dump($companiesName);
				for($i=0;$i<count($companiesName);$i++)
				{
					echo '<li><a href="http://localhost/users/menu.php?cname='.$companiesName[$i]["companyName"].'">'.$companiesName[$i]["companyName"].'</a></li>';
				}
				echo '</ul>
			
			</li>
			<li><a href="http://localhost/users/Order.php" >Order</a></li>
			<li><a href="http://localhost/users/about_us.php" >About us</a></li>			
			<li><a href="http://localhost/users/contact_us.php" >Contact us</a></li>
			<li class="planMeal"><a href="" >Plan Meal</a>
			
			<ul class="planUser">';
				//var_dump($companiesName);
				for($i=0;$i<count($companiesName);$i++)
				{
					echo '<li><a href="http://localhost/users/MealPlan.php?cname='.$companiesName[$i]["companyName"].'">'.$companiesName[$i]["companyName"].'</a></li>';
			
			    }
			}?>
		
			</ul></nav></div>
			<script src="../inc/controller/header.js"></script>
	</header>
