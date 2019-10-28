<?php
class Menu{
    
    private $itemId;
    private $itemName;
    private $itemPrice;
    private $itemImage;
    private $itemDetail;
    private $ingredient;
    private $day;
    private $dayId;

    public function __construct(  )
    {
    }

    public function saveMenu($itemName,$itemPrice,$itemImage,$itemDetail,
    $ingredient,string $day,$dayId)
    {
        $this->itemName=$itemName;
        $this->itemPrice=$itemPrice;
        $this->itemImage=$itemImage;
        $this->itemDetail=$itemDetail;
        $this->ingredient=$ingredient;
        $this->day=$day;
        $this->dayId=$dayId;
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