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

require_once("../requireFiles.php");

require_once("../inc/controller/OrderCalculation.class.php");

?>


<?php
$count= count($_COOKIE);
$found=false;
$found_item=false;
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>';
echo"<script src='../inc/controller/Order.js'></script>";
$order=new Order();
echo '<div class="order_outer_div"><div id="summary"><h1>Order Summary</h1>';

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
        echo "<td>$".$total_price."</td>";
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
echo '</div>';

?>


<?php
echo '<div id="payment_details"><form id="payment_form">
<div class="row">
<div class="col-50">
  <h3>Billing Address</h3>
  <label for="fname"><i class="fa fa-user"></i> Full Name</label>
  <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
  <label for="email"><i class="fa fa-envelope"></i> Email</label>
  <input type="text" id="email" name="email" placeholder="john@example.com">
  <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
  <input type="text" id="adr" name="address" placeholder="13811 90Ave">
  <label for="city"><i class="fa fa-institution"></i> City</label>
  <input type="text" id="city" name="city" placeholder="Surrey">

  <div class="row">
    <div class="col-50">
      <label for="state">State</label>
      <input type="text" id="state" name="state" placeholder="BC">
    </div>
    <div class="col-50">
      <label for="zip">Zip</label>
      <input type="text" id="zip" name="zip" placeholder="V3V 5S5">
    </div>
  </div>
  

  <div class="row">
  <div class="col-50">
    <label for="delivery">Delivery</label>
    <input type="radio" id="delivery" value="delivery" name="shipping_option">
  </div>
  <div class="col-50">
    <label for="pickUp">PickUp</label>
    <input type="radio" id="pickUp" value="pickUp" name="shipping_option">
  </div>
</div>

<div class="row">
  <div class="col-50">
    <label for="byCash">Cash</label>
    <input type="radio" id="byCash" value="Cash" name="paymentType">
  </div>
  <div class="col-50">
    <label for="byCard">Card</label>
    <input type="radio" id="byCard" value="Card" name="paymentType">
  </div>
</div>

</div>
     </div>
     
     
     <div id="pay_by_card">
     <div class="col-50">
     <h3>Payment</h3>
     <label for="fname">Accepted Cards</label>
     <div class="icon-container">
       <i class="fa fa-cc-visa" style="color:navy;"></i>
       <i class="fa fa-cc-amex" style="color:blue;"></i>
       <i class="fa fa-cc-mastercard" style="color:red;"></i>
       <i class="fa fa-cc-discover" style="color:orange;"></i>
     </div>
     <label for="cname">Name on Card</label>
     <input type="text" id="cname" name="cardname" placeholder="John More Doe">
     <label for="ccnum">Credit card number</label>
     <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
     <label for="expmonth">Exp Month</label>
     <input type="text" id="expmonth" name="expmonth" placeholder="September">
     <div class="row">
       <div class="col-50">
         <label for="expyear">Exp Year</label>
         <input type="text" id="expyear" name="expyear" placeholder="2018">
       </div>
       <div class="col-50">
         <label for="cvv">CVV</label>
         <input type="text" id="cvv" name="cvv" placeholder="352">
       </div>
     </div>
   </div>
   </div>
   <input type="submit" value="Continue to checkout" class="btn">
</form>
     </div>';
?>

<!--Footer-->
<?php

include ("../views/footer.php");
?>