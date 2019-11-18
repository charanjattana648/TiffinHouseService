<?php
class OrderedItemDetails{
//$itemId, $orderId	$itemName	$qty	$price	$itemTotalPrice	$companyName
private $itemId;
private $orderId;
private $itemName;
private $qty;
private $price;
private $companyName;

public function __construct(){}

    /**setting all values */
    public function addData($orderId, $itemName, $qty, $price, $companyName)
    {
        $this->orderId= $orderId;
        $this->itemName= $itemName;
        $this->qty= $qty;
        $this->price= $price;
        $this->companyName= $companyName;
    }


    public function getitemId(){
         return $this->itemId;
        }
    public function getorderId(){ 
        return $this->orderId;
    }
    public function getitemName(){ 
        return $this->itemName;
    }
    public function getqty(){
         return $this->qty;
        }
    public function getprice(){
         return $this->price;
        }
    public function getcompanyName(){ 
        return $this->companyName;
    }
}
?>