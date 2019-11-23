<?php
/**
* getter setter for menu entity class 
* detailed information about menu with $itemName,$itemPrice,$itemImage,$itemDetail,$ingredient,string $day,$dayId,$companyName,$itemId attributes.
*/
class Menu{
    
    private $itemId;
    private $itemName;
    private $itemPrice;
    private $itemImage;
    private $itemDetail;
    private $ingredient;
    private $day;
    private $dayId;
    private $companyName;

/**
* 
* 
* @return  empty constructor
*/
    public function __construct(  )
    {
    }

    public function saveMenu($itemName,$itemPrice,$itemImage,$itemDetail,
    $ingredient,string $day,$dayId,$companyName,$itemId=0)
    {
        
        $this->itemName=$itemName;
        $this->itemPrice=$itemPrice;
        $this->itemImage=$itemImage;
        $this->itemDetail=$itemDetail;
        $this->ingredient=$ingredient;
        $this->day=$day;
        $this->dayId=$dayId;
        $this->companyName=$companyName;
        $this->itemId=$itemId;
        
    }
    public function getCompanyName()
    {
        return $this->companyName;
    }
    public function getItemId()
    {
        return $this->itemId;
    }
    public function getItemName()
    {
        return $this->itemName;
    }
    public function getItemPrice() 
    {
        return $this->itemPrice;
    }
    public function getItemImage() 
    {
        return $this->itemImage;
    }
    public function getItemDetail() 
    {
        return $this->itemDetail;
    }
    public function getIngredient() 
    {
        return $this->ingredient;
    }
    public function getDay() 
    {
        return $this->day;
    }
    public function getDayId() 
    {
        return $this->dayId;
    }

}
?>