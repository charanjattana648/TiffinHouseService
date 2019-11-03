<?php
class Menu1{
    
    private $itemId;
    private $itemName;
    private $itemPrice;
    private $itemImage;
    private $itemDetail;
    private $ingredient;
    private $day;

    public function __construct(  )
    {
    }

    public function add2(  $itemName,  $itemPrice,  $itemImage,  $itemDetail,  $ingredient,string $day,$itemId=0)
    {
        $this->itemId=$itemId;
        $this->itemName=$itemName;
        $this->itemPrice=$itemPrice;
        $this->itemImage=$itemImage;
        $this->itemDetail=$itemDetail;
        $this->ingredient=$ingredient;
        $this->day=$day;
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

}
?>