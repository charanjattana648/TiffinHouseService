<?php
/**
* getter setter for contactUs entity class with messageId,firstNmae,LastNmae,userEmail,message,dateTime and messageTo attributes.
*/
class ContactUs{
    private $messageId;
    private	$firstName;
    private	$lastName;
    private	$userEmail;	 
    private $message;
    private $dateTime;
    private $messageTo;

    public function __construct(){
    }

    public function setData($messageTo,$firstName,$lastName,$userEmail, $message,$dateTime,$messageId=0)
    {
        $this->message_id=$messageId;
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->userEmail=$userEmail;
        $this->message=$message;
        $this->dateTime=$dateTime;
        $this->messageTo=$messageTo;
    }
    public function getMessageId():int
    {
        return $this->messageId;
    }
    public function getFirstName():string
    {
        return $this->firstName;
    }
    public function getLastName():string
    {
        return $this->lastName;
    }
    public function getUserEmail():string
    {
        return $this->userEmail;
    }
    public function getMessage():string 
    {
        return $this->message;
    }
    public function getDateTime()
    {
        return $this->dateTime;
    }
    public function getMessageTo():string
    {
        return $this->messageTo;
    }
    public function setFirstName(string $firstName)
    {
        $this->firstName=$firstName;
    }
    public function setLastName(string $lastName)
    {
        $this->lastName=$lastName;
    }
    public function setUserEmail(string $userEmail)
    {
        $this->userEmail=$userEmail;
    }
    public function setMessage(string $message)
    {
        $this->message=$message;
    }
    public function setDateTime(date $dateTime)
    {
        $this->dateTime=$dateTime;
    }
    public function setMessageTo(string $messageTo)
    {
        $this->messageTo=$messageTo;
    }
}

?>