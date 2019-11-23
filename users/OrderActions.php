<?php      
ob_start();   
require_once("../requireFiles.php");
?>
<?php
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
    //echo "<script> alert('".$orderId."')</script>";
    
   if( $orderId!="")
   {
    echo "<h3>Thanks for Shopping!!"."</h3>";
    echo "<h3>Your Order number is ".$orderId."!!</h3>";
   foreach($_COOKIE as $key=>$val)
    {
      if(stristr($key, 'item')) {
    
        $cartItem=json_decode($val,true);
        //  echo $cartItem['itemName']."<br>";
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
         //   echo "weekly found";
            //doing add table over here
         }else if (stripos($cartItem['itemName'], "Monthly")===0) {
            $interval = new DateInterval('P1M');
            $today->add($interval);
            $exp_date=$today->format('Y-m-d H:i:s');
            $orderStatus->addData($itemId, $orderId,$exp_date, $currDate->format('Y-m-d H:i:s'));
            $db::addOrderStatus($orderStatus);
          //  echo "monthly found";
          }
          $order=new Order();
          $order->emptyCart();
          // $cartItem['companyName'] change name
          
         
      }
    }
    echo '<a href="http://localhost/index.php">Ok</a>';
  }
   
   }  
  }else{      
    echo "<script> alert('You don't have any Items to Pay'); </script>";
  }



?>