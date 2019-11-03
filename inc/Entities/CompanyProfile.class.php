<?php
//companyName	phoneNumber	email	address	city	Province	country	postalCode	companyImage

class CompanyProfile{
    private $companyName;
    private	$phoneNumber;
    private	$email;
    private	$address;	 
    private $city;
    private $province;
    private $country;
    private $postalCode;
    private $companyImage;

    public function __construct(){
    }

    public function setData($companyName,$phoneNumber,$email,$address,$city,$province,$country,$postalCode,$companyImage)
    {
        $this->companyName=$companyName;
        $this->phoneNumber=$phoneNumber;
        $this->email=$email;
        $this->address=$address;
        $this->city=$city;
        $this->province=$province;
        $this->country=$country;
        $this->postalCode=$postalCode;
        $this->companyImage=$companyImage;
    }
   
    //
    public function getCompanyName():string
    {
        return $this->companyName;
    }
    public function getPhoneNumber():string
    {
        return $this->phoneNumber;
    }
    public function getEmail():string
    {
        return $this->email;
    }
    public function getAddress():string
    {
        return $this->address;
    }
    public function getCity():string 
    {
        return $this->city;
    }
    public function getProvince()
    {
        return $this->province;
    }
    public function getCountry():string
    {
        return $this->country;
    }
    public function getPostalCode():string
    {
        return $this->postalCode;
    }
    public function getCompanyImage()
    {
        return $this->companyImage;
    }
    public function setCompanyImage($companyImage)
    {
        $this->phoneNumber=$phoneNumber;
    }
    public function setPostalCode(string $postalCode)
    {
        $this->postalCode=$postalCode;
    }
    public function setPhoneNumber(string $phoneNumber)
    {
        $this->phoneNumber=$phoneNumber;
    }
    public function setEmail(string $email)
    {
        $this->email=$email;
    }
    public function setAddress(string $address)
    {
        $this->address=$address;
    }
    public function setCity(string $city)
    {
        $this->city=$city;
    }
    public function setProvince(date $province)
    {
        $this->province=$province;
    }
    public function setcountry(string $country)
    {
        $this->country=$country;
    }
}



?>