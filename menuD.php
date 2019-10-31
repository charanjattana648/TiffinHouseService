<?php         
require_once("inc/config.inc.php");
include ("./views/header.php");
include("./views/signUp.php");
include("./views/login.php");
require_once ("./inc/Utility/auth.php");
require_once  ("inc/Entities/User.class.php");
require_once  ("./inc/Entities/Menu.class.php");
require_once ("./inc/Utility/db.php");
require_once ("./inc/Utility/PDOAgent.class.php");
//require_once ("./inc/config.inc.php");
?>
<div id="dealerMenu">
<div >
<form id="dForm" method="Post" action="menuD.php" enctype="multipart/form-data">
<select name="day" id="day">
    <option value="">Select Day</option>
    <option value="Monday:1">Monday</option>
    <option value="Tuesday:2">Tuesday</option>
    <option value="Wednesday:3">Wednesday</option>
    <option value="Thrusday:4">Thrusday</option>
    <option value="Friday:5">Friday</option>
    <option value="Saturday:6">Saturday</option>
    <option value="Sunday:7">Sunday</option>
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
    <input type="text" name="ingredient_data" id="ing_data"/>
	<button type="submit" name="submitIngredient" id="add_ingredient">Add Ingredient</button>
	
    <button type="submit" name="submitItem" id="add_item">Add Item</button>
    <button type="submit" name="getItem">Get Item</button>
	
<!--itemName	itemPrice	itemImage	itemDetail	ingredient	day-->

</form>
</div>
</div>
<article>
<?php
 echo "<script src='./inc/controller/menu_dealer.js'></script>";
if(isset($_POST['getItem']))
{
    echo "Items fetched are : <br>";
    $db=new database();

    $db::initialize("Menu");
    $menu=$db::getMeal();
    // var_dump($menu);
    $x=count($menu);
   
    $days=array();
    $isNewDay=true;
    
    foreach($menu as $m)
    {
        // echo $m->getItemDetail()."<br>";
        // echo $m->getIngredient()."<br>";
     
        if(in_array($m->getDay(),$days))
        {
            $isNewDay=false;
        }else{
            array_push($days,$m->getDay());
            $isNewDay=true;
        }
        if($isNewDay)
        {
          echo '<div class="menutable">'.$m->getDay();
        }
        if($m->getItemImage()!=null)
        {
            echo '<a href="##"><img src="data:image/jpg;base64,'.base64_encode($m->getItemImage()).'"/> </a>';
        }
        echo'<div class="hover_menu_img">
        <p>'.$m->getItemName().' </p>
        <p>$'. $m->getItemPrice().'</p>        
        </div>';
    }
    echo' </div>';
}
if(isset($_POST['submitItem']))
{
    $menu=new Menu();
    $menu_day_array=explode(":",$_POST['day']);
    $binary = file_get_contents($_FILES['itemImage']['tmp_name']);
    $menu->saveMenu($_POST['itemName'],$_POST['itemPrice'],$binary,
    $_POST['itemDetail'],$_POST['ingredient_data'],$menu_day_array[0],$menu_day_array[1]);
    
    $db=new database();
    $db::initialize("Menu");
    $mealName=$db::addMeal($menu);
    echo $mealName." is Name";
}
?>
</article>
<p></p>

<?php include ("./views/footer.php");?>
        
    </body>
</html>