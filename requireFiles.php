

<?php
session_start();
//php class objects
require_once  ("../inc/Entities/MealPlan.class.php");
require_once("../inc/Entities/AboutUS.class.php");
require_once("../inc/Entities/CompanyProfile.class.php");
require_once  ("../inc/Entities/User.class.php");
require_once  ("../inc/Entities/Menu.class.php");
require_once  ("../inc/Entities/ContactUs.class.php");
require_once("../inc/Entities/CompanyProfile.class.php");


require_once  ("../inc/Entities/Dealer.class.php");
require_once  ("../inc/Entities/User.class.php");
require_once  ("../inc/Entities/CompanyProfile.class.php");
require_once ("../inc/Utility/auth.php");
require_once ("../inc/Utility/db.php");
require_once ("../inc/Utility/PDOAgent.class.php");
include ("../views/header.php");
include("../views/signUp.php");
include("../views/login.php");

//about dealer
// require_once("inc/config.inc.php");
// include ("./views/header.php");
// include("./views/signUp.php");
// include("./views/login.php");
// require_once ("./inc/Utility/auth.php");
// require_once  ("inc/Entities/User.class.php");
// require_once  ("./inc/Entities/Menu.class.php");
// require_once  ("./inc/Entities/MealPlan.class.php");
// require_once ("./inc/Utility/db.php");
// require_once ("./inc/Utility/PDOAgent.class.php");

//include("./views/header.php");
//require_once(".././inc/Entities/AboutUS.class.php");
require_once("../inc/Utility/db.php");
require_once("../inc/config.inc.php");
//include ("./views/header.php");

//manu
//require_once  ("inc/Entities/User.class.php");
// require_once("./views/signUp.php");
// require_once("./views/login.php");
require_once ("../inc/Utility/auth.php");
//require_once  ("./inc/Entities/Menu.class.php");
//require_once ("./inc/Utility/db.php");
require_once ("../inc/Utility/PDOAgent.class.php");

//contact us
// include ("./views/header.php");
// include("./views/signUp.php");
//include("./views/login.php");
//require_once  ("inc/Utility/db.php");


//company profile
//include("./views/header.php");
//require_once("./inc/Utility/db.php");

?>