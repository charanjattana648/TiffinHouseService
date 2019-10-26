<?php
class Dealer extends User{
    private $companyName;
    private $isVerified=false;

    public function __construct($firstName,$lastName,$userEmail,$password,$phoneNumber,$address,$postalCode,$companyName,$isVerified=false){
        parent::__construct($firstName,$lastName,$userEmail,$password,$phoneNumber,$address,$postalCode);
        $this->companyName=$companyName;
        $this->isVerified=$isVerified;
    }
    public function setCompanyName(string $companyName)
    {
        $this->companyName=$companyName;
    }

    public function getcompanyName():string
    {
        return $this->companyName;
    }
}
?>