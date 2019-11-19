<?php      
ob_start();   
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
    $_SESSION['tax']=0;
    $_SESSION['totalPrice']=0;
}else{
    echo "<tr><td>Total Tax</td><td>".$order->toatlQty()."</td><td colspan='2'>$".$order->calculateTax()."</td><td></td></tr>";
    echo "<tr><td>Total Price</td><td>".$order->toatlQty()."</td><td colspan='2'>$".$order->calculateTotalPrice()."</td><td></td></tr>";
    echo "</table>";
    $_SESSION['tax']=$order->calculateTax();
    $_SESSION['totalPrice']=$order->calculateTotalPrice();

}
echo '</div>';

?>


<?php
echo '<div id="payment_details"><form method="POST" id="payment_form">
<div class="row">
<div class="col-50">
  <h3>Billing Address</h3>
  <label for="fname"><i class="fa fa-user"></i> Full Name</label>
  <input type="text" id="fname" name="fullname" placeholder="John M. Doe">
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
    <input type="radio" id="pickUp" value="pickUp" name="shipping_option" checked>
  </div>
</div>

<div class="row">
  <div class="col-50">
    <label for="byCash">Cash</label>
    <input type="radio" id="byCash" value="Cash" name="paymentType" checked>
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
   <input type="submit" name="checkout" value="Continue to checkout" class="btn">
   <input type="submit" name="checkout1" value="Continue to checkout1" class="btn">
</form>
     </div>';
?>

<?php
//var_dump($_COOKIE);
$date_old = '23-5-2016 23:15:23'; 
//Date for database
// if(isset($_POST['checkout1']))
// {
//   $today=new DateTime();
//   $date = date('Y-m-d H:i:s');
//   date_default_timezone_set('America/Vancouver');
//   $today = new DateTime();
//   $interval = new DateInterval('P1W');
//   $today->add($interval);
//   $exp_date=$today->format('Y-m-d H:i:s');
//   if (stripos($cartItem['itemName'], "Weekly")===0 ) {
//     echo "weekly found";
//  }else if (stripos($cartItem['itemName'], "Monthly")===0) {
//   echo "monthly found";
//   }else{
//    echo "not found";
//  }
// }
if(isset($_POST['checkout']))
{

  $personDetails=new OrderPersonDetails();
  $OrderedItem=new OrderedItemDetails();
  $orderStatus=new OrderStatus();
  $today=new DateTime();
  $currDate=$today;
  $date = date('Y-m-d H:i:s');
  date_default_timezone_set('America/Vancouver');
  $today = new DateTime();
  $paymentStatus="completed";
  if($_POST['paymentType']=="Cash")
  {
    $paymentStatus="pending";
  }

  if(isset($_SESSION['totalPrice']) && $_SESSION['totalPrice']!=0)
  {
  $personDetails->addData( $_POST['fullname'], $_POST['email'],$_POST['address'] ,
  $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['shipping_option'], $_POST['paymentType'], $_SESSION['tax'],$_SESSION['totalPrice'], $paymentStatus);
   $db=new database();
   $db::initialize("OrderPersonDetails");
   $orderId=$db::addOrderpersondetails($personDetails);
    echo "<script> alert('".$orderId."')</script>";
   //adding item to table
   if( $orderId!="")
   {
   foreach($_COOKIE as $key=>$val)
    {
      if(stristr($key, 'item')) {
    
        $cartItem=json_decode($val,true);
          echo $cartItem['itemName']."<br>";
          //doing
          $OrderedItem->addData($orderId,$cartItem['itemName'], $cartItem['qty'], $cartItem['price'],$cartItem['companyName']);
          $db::initialize("OrderedItemDetails");
          $itemId=$db::addOrdereditemdetails($OrderedItem);

          if (stripos($cartItem['itemName'], "Weekly")===0 ) {
            
            $interval = new DateInterval('P1W');
            $today->add($interval);
            $exp_date=$today->format('Y-m-d H:i:s');//$date->format('Y-m-d H:i:s');
            $orderStatus->addData($itemId, $orderId,$exp_date, $currDate->format('Y-m-d H:i:s'));
            $db::addOrderStatus($orderStatus);
            echo "weekly found";
            //doing add table over here
         }else if (stripos($cartItem['itemName'], "Monthly")===0) {
            $interval = new DateInterval('P1M');
            $today->add($interval);
            $exp_date=$today->format('Y-m-d H:i:s');
            $orderStatus->addData($itemId, $orderId,$exp_date, $currDate->format('Y-m-d H:i:s'));
            $db::addOrderStatus($orderStatus);
            echo "monthly found";
          }
          $order->emptyCart();
          // $cartItem['companyName'] change name
         
      }
    }
  }
   
   }  
  }else{
    echo "<script> alert('You don't have any Items to Pay'); </script>";
  }



?>

<!--Footer-->
<?php

include ("../views/footer.php");
?>