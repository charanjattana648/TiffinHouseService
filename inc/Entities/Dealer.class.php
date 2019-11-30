<?php

/**
 * Dealer class 
 * getter setter for dealer class with $companyName,$isverified,$firstName,$lastName,$userEmail,$password,$phoneNumber,$address,$postalCode attributes.
 */
class Dealer
{
    private $companyName;
    private $isVerified = 0;
    private $firstName;
    private $lastName;
    private $userEmail;
    private $password;
    private $phoneNumber;
    private $address;
    private $postalCode;
    /**
     * constructor for Dealer class
     */
    public function __construct()
    { }

    /**
     * sets data which is passed to database latter.
     */
    public function setData($firstName, $lastName, $userEmail, $password, $phoneNumber, $address, $postalCode)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userEmail = $userEmail;
        $this->password = $password;
        $this->phoneNumber = $phoneNumber;
        $this->address = $address;
        $this->postalCode = $postalCode;
        $this->isVerified = 0;
    }
    public function setCompanyName(string $companyName)
    {
        $this->companyName = $companyName;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }
    public function getIsVerified(): int
    {
        return $this->isVerified;
    }

    /***user class data */
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    public function getLastName(): string
    {
        return $this->lastName;
    }
    public function getUserEmail(): string
    {
        return $this->userEmail;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
    public function getAddress(): string
    {
        return $this->address;
    }
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }
    public function setUserEmail(string $userEmail)
    {
        $this->userEmail = $userEmail;
    }
    public function setPassword(string $password)
    {
        $this->password = $password;
    }
    public function setPhoneNumber(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
    public function setAddress(string $address)
    {
        $this->address = $address;
    }
    public function setPostalCode(string $postalCode)
    {
        $this->postalCode = $postalCode;
    }
}
?>
