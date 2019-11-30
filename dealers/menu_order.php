<?php
ob_start();
require_once("../requireFiles.php");
if ((isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == TRUE && $_SESSION['User_type'] == "dealer") || ($_SESSION["loggedIn"] == TRUE && $_SESSION['User_type'] == "admin")) {
    ?>


<?php
/**
 * display the ordered item to respective dealer and on order completed item status will change and will on longer be displayed onorder page
 */

    $db = new database();
    //$_SESSION['company_name']="Hunger Feed";
    $db::initialize("OrderedItemDetails");
    if (isset($_SESSION['company_name'])) {
        $orderedItems = $db::getOrdereditemdetails($_SESSION['company_name']);
    }

    $oId = "";
    $oldId = "";
    $isDifferentOrder = false;
    $istableExist = false;
    $_SESSION['notcompleted'] = 0;
    foreach ($orderedItems as $items) {
        global $notcompleted;
        $itemId = $items->getItemId();
        $orderId = $items->getOrderId();
        $db::initialize("OrderPersonDetails");
        $persondetails_array = $db::getOrderpersondetails($orderId);
        $notcompleted = count($persondetails_array);
        $_SESSION['notcompleted'] = $notcompleted;
        if ($notcompleted != 0) {

            $isDifferentOrder = false;
            if ($oId == "" || $oId != $orderId) {
                $oId = $orderId;
                $isDifferentOrder = true;
                if ($istableExist) {
                    echo "</table><div><form method='POST' action='http://localhost/dealers/menu_order.php'>
        <label class='completed' for='myCheck'>Is Completed</label>
        <input type='checkbox' id='myCheck' name='myCheck' value='" . $oldId . "' />
        <input type='hidden' name='order_val' id='order_val'/>
        <input type='submit' id='btnOrderCompleted' name='btnorderCompleted' value='Order Completed' /></form>
        </div>";
                }

                echo "<div><h2 class='p_detail'> Person Details</h2></div><table><tr><th>Name</th><th>Email</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Shipping Option</th>
       <th>Tax</th><th>Total Price</th><th>Payment Type</th><th>Payment Status</th><th>Order Id</th><th>isCompleted</th></tr>";

                foreach ($persondetails_array as $persondetails) {

                    echo "<tr>
    <td>" . $persondetails->getName() . "</td><td>" . $persondetails->getEmail() . "</td>
    <td>" . $persondetails->getAddress() . "</td><td>" . $persondetails->getCity() . "</td>
    <td>" . $persondetails->getState() . "</td><td>" . $persondetails->getZip() . "</td>
    <td>" . $persondetails->getShippingOption() . "</td><td>$" . $persondetails->getTax() . "</td>
    <td>" . $persondetails->getTotalPrice() . "</td><td>" . $persondetails->getPaymentType() . "</td>    
    <td>" . $persondetails->getPaymentStatus() . "</td><td>" . $persondetails->getOrderId() . "</td>
    <td>" . $persondetails->getIsCompleted() . "</td></tr>";
                }
                echo "</table>";
            }
            if ($isDifferentOrder) {

                echo "<div><h2 class='o_detail'>Order Details</h2></div><table id='itemTable'><tr><th>Item Id</th><th>Order Id</th><th>Item Name</th><th>Qty</th><th>Price</th><th>Company Name</th></tr>";
                $istableExist = true;
                $oldId = $orderId;
            }
            echo "<tr>
    <td>" . $items->getItemId() . "</td><td>" . $items->getOrderId() . "</td>
    <td>" . $items->getItemName() . "</td><td>" . $items->getQty() . "</td>
    <td>" . $items->getPrice() . "</td><td>" . $items->getCompanyName() . "</td></tr>";
        }
    }
    //if($_SESSION['notcompleted']!=0){
    echo "</table><div><form method='POST' action='http://localhost/dealers/menu_order.php'>
    <label class='completed' for='myCheck'>Is Completed</label>
    <input type='checkbox' id='myCheck' name='myCheck' value='" . $oldId . "' />
    <input type='hidden' name='order_val' id='order_val'/>
    <input type='submit' id='btnOrderCompleted' name='btnorderCompleted' value='Order Completed' />
    </form></div>";
    //}
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>';
    echo '<script src="../inc/controller/menu_order.js"></script>';

    ?>

<?php

    if (isset($_POST['btnorderCompleted'])) {
        $db::initialize("OrderPersonDetails");
        $persondetails_array = $db::getOrderpersondetails($orderId);
        if (isset($_POST['order_val'])) {
            $db = new database();
            $db::initialize("orderpersondetails");
            $db::setOrderCompleted($_POST['order_val']);
            echo "<script>alert('Updated order " . $_POST['order_val'] . "')</script>";
        }
    }

    ?>


<?php include(".././views/footer.php");
} else {
    header("Location: http://localhost/index.php");
}
?>