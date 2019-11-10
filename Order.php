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
require_once("./inc/controller/OrderCalculation.class.php");

?>

<?php
$count= count($_COOKIE);

$found=false;
$found_item=false;
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>';
echo"<script src='./inc/controller/Order.js'></script>";

$order=new Order();
foreach($_COOKIE as $key=>$val)
{
    $pos=strpos($key,"item",0);
    if($pos==0)
    {
        $index = (int) filter_var($key, FILTER_SANITIZE_NUMBER_INT);
        $count+=$index;
        $found_item=true;
    }
}
$index=1;
while($index < $count)
{
  if(isset($_COOKIE["item".$index]) && $_COOKIE["item".$index]!="")
    {
        if($found==false)
        {
            echo"<table><tr><th>Name</th><th>Qty</th><th>Price</th><th>Total Price</th><th>Delete</th></tr>";
        }
        echo "<tr>";        
        $cartItem=$_COOKIE["item".$index];      
        $cartItem=json_decode($cartItem,true);
        echo "<td>".$cartItem['itemName']."</td>";
        echo "<td>".$cartItem['qty']."</td>";
        echo "<td>".$cartItem['price']."</td>";
        //$total_price="<script>calculatePrice(".$cartItem['qty'].",".($cartItem['price']).")</script>";
        
        $total_price=$order->calculatePrice($cartItem['qty'],substr($cartItem['price'],1));
        echo "<td>$".$total_price."</td>s";
       echo "<td id='del'><i id='item".$index."' class='fa fa-trash' aria-hidden='true'></i></td></tr>";
       $found=true;
    }    
    $index++;
}
if($found==false){
    echo "Card is Empty";
}else{
    echo "<tr><td>Total Tax</td><td>".$order->toatlQty()."</td><td colspan='2'>$".$order->calculateTax()."</td><td></td></tr>";
    echo "<tr><td>Total Price</td><td>".$order->toatlQty()."</td><td colspan='2'>$".$order->calculateTotalPrice()."</td><td></td></tr>";
    echo "</table>";
}

?>

<!--Footer-->
<?php

include ("./views/footer.php");
?>