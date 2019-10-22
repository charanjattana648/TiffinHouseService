<?php
class Menu{
    private $itemName=array();
    private $itemPrice=array();
    private $itemImage=array();
    private $itemDetail=array();
    private $ingredient=array();
    private $day;

    public function __construct(array $itemName,array $itemPrice,array $itemImage,array $itemDetail,array $ingredient,string $day)
    {
        $this->itemName=$itemName;
        $this->itemPrice=$itemPrice;
        $this->itemImage=$itemImage;
        $this->itemDetail=$itemDetail;
        $this->ingredient=$ingredient;
        $this->day=$day;
    }

    public function getItemName():array
    {
        return $this->itemName;
    }
    public function getItemPrice():array
    {
        return $this->itemPrice;
    }
    public function getItemImage():array
    {
        return $this->itemImage;
    }
    public function getItemDetail():array
    {
        return $this->itemDetail;
    }
    public function getIngredient():array
    {
        return $this->ingredient;
    }
    public function getDay():array
    {
        return $this->day;
    }

}
?>