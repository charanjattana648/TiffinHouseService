<?php
/**
* getter setter for OrderPersonDetails entity class
* with orderId	name,emailaddress, city, state, zip,shippingOption,	paymentType,tax,totalPrice,	paymentStatus attributes
* details about order of user
*/


class OrderPersonDetails{
    private $name;
    private $email;
    private $address;
    private $city;
    private $state;
    private $zip;
    private $shippingOption;
    private $paymentType;
    private $tax;
    private $totalPrice;
    private $paymentStatus;
    private $orderId;
    private $isCompleted;

    public function __construct(){}

    /**setting all values */
    public function addData( $name, $email,$address ,$city, $state, $zip, $shippingOption, $paymentType, $tax,$totalPrice, $paymentStatus,$isCompleted="pending")
    {
        $this->name= $name;
        $this->email= $email;
        $this->address= $address;
        $this->city= $city;
        $this->state= $state;
        $this->zip= $zip;
        $this->shippingOption=$shippingOption;
        $this->paymentType= $paymentType;
        $this->tax= $tax;
        $this->totalPrice=$totalPrice;
        $this->paymentStatus=$paymentStatus;
    }
    /**getters */
    public function getIsCompleted()
    {
        return $this->isCompleted;
    }
    public function getOrderId()
    {
        return $this->orderId;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getAddress(){
        return $this->address;
    }
    public function getcity(){
        return $this->city;
    }
    public function getState(){
        return $this->state;
    }
    public function getZip(){
        return $this->zip;
    }
    public function getShippingOption(){
        return $this->shippingOption;
    }
    public function getPaymentType(){
        return $this->paymentType;
    }
    public function getTax(){
        return $this->tax;
    }
    public function getTotalPrice(){
        return $this->totalPrice;
    }
    public function getPaymentStatus(){
        return $this->paymentStatus;
    }

}







?>