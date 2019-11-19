<?php
class OrderStatus{
    private $itemId;
    private $orderId;
    private $expDate;
    private $currDate;
    private $isActive;

    public function __construct(){}
    
    public function addData($itemId, $orderId,$expDate,$currDate,$isActive=1)
    {
    $this->itemId=$itemId;
    $this->orderId=$orderId;
    $this->expDate=$expDate;
    $this->currDate=$currDate;
    $this->isActive=$isActive;
    }

    public function getitemId(){
         return $this->itemId;
        }
    public function getorderId(){
        return $this->orderId;
       }
    public function getexpDate(){
        return $this->expDate;
       }
    public function getcurrDate(){
        return $this->currDate;
       }
    public function getisActive(){
        return $this->isActive;
       }
       


}

?>