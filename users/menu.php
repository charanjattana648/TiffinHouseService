
<?php         
// require_once("inc/config.inc.php");
// include ("./views/header.php");
// include("./views/signUp.php");
// include("./views/login.php");
// require_once ("./inc/Utility/auth.php");
// require_once  ("inc/Entities/User.class.php");
// require_once  ("./inc/Entities/Menu.class.php");
// require_once ("./inc/Utility/db.php");
// require_once ("./inc/Utility/PDOAgent.class.php");
//require_once ("./inc/config.inc.php");
require_once("../requireFiles.php");
?>
<h2><?php if(isset($_SESSION['companyName'])){echo $_SESSION['companyName']." ";}?>Menu</h2>
<?php


$db=new database();
$db::initialize("Menu");
$menu=$db::getMeal();
// $x=count($menu);   
$days=array();
$isNewDay=true;
$i=0;
echo' <div id="menu_div">';
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
        $i=0;
    }
    $i++;
    if($isNewDay)
    {
      echo '<div class="menutable"><div id="day_id">'.$m->getDay().'</div>';
    }
    if($m->getItemImage()!=null)
    {      
        $itemName = preg_replace('/\s/', '_', $m->getItemName());
        echo '<a id="menu_items" href="#'.$itemName.'"><img src="data:image/jpg;base64,'.base64_encode($m->getItemImage()).'"/> </a>';
    }
    echo'<div class="hover_menu_img">
    <p>'.$m->getItemName().' </p>
    <p class="'.$itemName.'">$'. $m->getItemPrice().'</p>';   
    echo' </div>';
    if($i==3)
    {    
      echo' </div>';
    }   
    
}
echo' </div>';
foreach($menu as $m)
{
  $itemName = preg_replace('/\s/', '_', $m->getItemName());
 echo '<section id="'.$itemName.'" class="vegMenu">
<section class="leftphoto">
<img style="height: 250px; width: 260px;" src="data:image/jpg;base64,'.base64_encode($m->getItemImage()).'"/>
</section>
<section class="righttext">
<h1>'.$m->getItemName().'</h1><p>'.$m->getItemDetail().'</p>
<h3>Ingredients</h3><ul>';
$ingredients=explode(",",$m->getIngredient());
foreach($ingredients as $i)
{
echo '<li>'.$i.'</li>';
}
echo'</ul>
<span id="minus">-</span>
<input type="number" min="0" name="qtyItem" id="qty_item" value="0" placeholder="enter qty" />
<span id="plus">+</span>
<button type="submit" class="mi_to_cart" name="mi_to_cart" id="'.$itemName.'">Add to Cart</button>
</section>
</section>';
}
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
 
  $("section.vegMenu").hide();
$("a#menu_items").click(function(event){
  var itemName=$(this).attr("href");
  $("section.vegMenu").hide();
  itemName=itemName.replace(" ","");
$("section"+itemName).show();
})})
</script>';
echo '<script src="../inc/controller/menu.js"></script>'
?>

	
<!--Footer-->
<?php

include ("../views/footer.php");
?>