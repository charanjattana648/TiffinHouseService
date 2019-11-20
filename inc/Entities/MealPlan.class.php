<?php
/**
* getter setter for MealPlan entity class with  $companyName,$tiffinType,$price,$tiffinDescription,$subscriptionType attributes
*/
class MealPlan{
    private $companyName;
    private $tiffinType;
    private $price;
    private $tiffinDescription;
    private $subscriptionType;

    public function __construct(){

    }
    public function setData($companyName,$tiffinType,$price,$tiffinDescription,$subscriptionType){
        $this->companyName=$companyName;
        $this->tiffinType=$tiffinType;
        $this->price=$price;
        $this->tiffinDescription=$tiffinDescription;
        $this->subscriptionType=$subscriptionType;
    }
/**MealPlan getters */
    public function getCompanyName():string 
    {
        return $this->companyName;
    }
    public function getTiffinType():string 
    {
        return $this->tiffinType;
    }
    public function getPrice() 
    {
        return $this->price;
    }
    public function getTiffinDescription():string 
    {
        return $this->tiffinDescription;
    }
    public function getSubscriptionType():string 
    {
        return $this->subscriptionType;
    }  
     /**MealPlan setters  */

    public function setCompanyName(string $companyName) 
    {
        $this->companyName=$companyName;
    }
    public function setTiffinType(string $tiffinType)
    {
        $this->tiffinType=$tiffinType;
    }
    public function setPrice($price) 
    {
        $this->price=$price;
    }
    public function setTiffinDescription(string $tiffinDescription) 
    {
        $this->tiffinDescription=$tiffinDescription;
    }
    public function setSubscriptionType(string $subscriptionType) 
    {
        $this->subscriptionType=$subscriptionType;
    }

}

?>