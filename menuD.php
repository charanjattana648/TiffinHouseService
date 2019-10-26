
        <?php 
        
require_once("inc/config.inc.php");
include ("./views/header.php");
include("./views/signUp.php");
include("./views/login.php");
require_once ("./inc/Utility/auth.php");
require_once  ("inc/Entities/User.class.php");
require_once  ("./inc/Entities/MenuD.class.php");
require_once ("./inc/Utility/db.php");
require_once ("./inc/Utility/PDOAgent.class.php");
//require_once ("./inc/config.inc.php");
?>
<div id="dealerMenu">
<div >
<form id="dForm" method="Post" action="menuD.php">
<select name="day" id="day">
    <option value="">Select Day</option>
    <option>Monday</option>
    <option>Tuesday</option>
    <option>Wednesday</option>
    <option>Thrusday</option>
    <option>Friday</option>
    <option>Saturday</option>
    <option>Sunday</option>
</select><br><br>
<label for="itemName">ItemName</label>
	<input type="text" name="itemName" id="itemName" placeholder="enter itemName"/><br>
	
	
	<label for="itemPrice">ItemPrice</label>
	<input type="text" name="itemPrice" id="itemPrice" placeholder="enter itemPrice"/><br>
	
	
	<label for="itemImage">ItemImage</label><br>
	<input type="file" name="itemImage" id="itemImage" placeholder="enter itemImage"/><br>
	
	<label for="itemDetail">ItemDetail</label>
	<input type="text" name="itemDetail" id="itemDetail" placeholder="enter itemDetail"/><br>
	
	
	<label for="ingredient">ingredient</label>
	<input type="text" name="ingredient" id="ingredient" placeholder="enter ingredient"/>
	<button type="submit" name="submitIngredient">Add Ingredient</button>
	
    <button type="submit" name="submitItem">Add Item</button>
    <button type="submit" name="getItem">Get Item</button>
	
<!--itemName	itemPrice	itemImage	itemDetail	ingredient	day-->

</form>
</div>
</div>
<?php

if(isset($_POST['getItem']))
{
    echo "Items fetched are : <br>";
    $db=new database();

    $db::initialize("Menu1");
    $menu=$db::getMeal();
    // var_dump($menu);
    $x=count($menu);
    echo '<div>
 
    Monday';
    $days=array();
    
    foreach($menu as $m)
    {
        // echo $m->getItemDetail()."<br>";
        // echo $m->getIngredient()."<br>";

        echo'<div class="hover_menu_img"><a href="##"><img src="images/menu_chole-recipe.png"/> </a>
        <p>'.$m->getItemName().' </p>
        <p>$'. $m->getItemPrice().'</p>
        </div>';
    }
    echo' </div>';
}
?>


<?php include ("./views/footer.php");?>
        
    </body>
</html>