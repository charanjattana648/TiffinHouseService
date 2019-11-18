<?php

class OrderStatus{
    //	itemId	orderId	ExpDate	currDate	isActive
    private $itemId;
    private $orderId;
    private $ExpDate;
    private $currDate;
    private $isActive;
    public function __construct(){ }
    public function addData($itemId, $orderId,$ExpDate, $currDate,$isActive=1){
        $this->itemId=$itemId;
        $this->orderId=$orderId;
        $this->ExpDate=$ExpDate;
        $this->currDate=$currDate;
        $this->isActive=$isActive;
    }

    public function getitemId(){
        return $this->itemId;
    }
    public function getorderId(){
        return $this->orderId;
    }
    public function getExpDate(){
        return $this->ExpDate;
    }
    public function getcurrDate(){
        return $this->currDate;
    }
    public function getisActive(){
        return $this->isActive;
    }

}
?>