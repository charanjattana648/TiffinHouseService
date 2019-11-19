<?php
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

require_once("../requireFiles.php");
?>
<?php 
$db=new database();
$db::initialize("MealPlan");
if(isset($_GET['cname']))
{
    $meal_plan=$db::getTiffinPlan($_GET['cname']); 
}else{
    $meal_plan=$db::getTiffinPlan("Tiffin House"); 
}
?>
<h1 id="mealplan_heading"><?php if(isset($_GET['cname'])){echo $_GET['cname'] ; 
}else{echo "Happy";}?></h1>
<h2 style="text-align:center">Subscribe your Plan</h2>



<?php
echo '<div id="weekly_div">';
    for($i=0;$i<count($meal_plan);$i++)
    {
        if($meal_plan[$i]->getSubscriptionType()=="Weekly")
        {
              echo'<div class="card">
              <h1 name="subscriptionType" id="subscriptionType">'.$meal_plan[$i]->getSubscriptionType().'</h1>
                <img src="../images/'.$meal_plan[$i]->getTiffinType().'.jpg" alt="Denim Jeans" style="width:100%" >
                <h1 id="tiffinType">'.$meal_plan[$i]->getTiffinType().' Tiffin</h1>
                <p class="price">$'.$meal_plan[$i]->getPrice().'</p>
                
                <p>'.$meal_plan[$i]->getTiffinDescription().'</p>
                <label for="tiff_qty">Quantity</label>
                <input type="number" name="tiffin_qty" id="tiff_qty" min="1" value="1"/>
                <p><button id="mealPlan_cart" name="'.$meal_plan[$i]->getTiffinType().'" ?>Add to Cart</button></p>
                </div>';
        }
      
    }
   echo '</div>';
   echo "<br>";

   echo '<div id="monthly_div">';
    for($i=0;$i<count($meal_plan);$i++)
    {
        if($meal_plan[$i]->getSubscriptionType()=="Monthly")
        {
              echo'<div class="card">
              <h1 name="subscriptionType" id="subscriptionType">'.$meal_plan[$i]->getSubscriptionType().'</h1>
                <img src="../images/'.$meal_plan[$i]->getTiffinType().'.jpg" alt="Denim Jeans" style="width:100%" >
                <h1 id="tiffinType">'.$meal_plan[$i]->getTiffinType().' Tiffin</h1>
                <p class="price">$'.$meal_plan[$i]->getPrice().'</p>
                
                <p>'.$meal_plan[$i]->getTiffinDescription().'</p>
                <label for="tiff_qty">Quantity</label>
               
                <input type="number" name="tiffin_qty" id="tiff_qty" min="1" value="1"/>
                <p><button id="mealPlan_cart" name="'.$meal_plan[$i]->getTiffinType().'" ?>Add to Cart</button></p>
                </div>';
        }
      
    }
   echo '</div>';
   echo "<br>";
   echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>';
   echo '<script src="../inc/controller/menu.js"></script>'

?>


<?php
include ("../views/footer.php");
?>