<?php
class Order
{
    private static $total_price=0;
    private static $tax=0;
    public static $quantity=0;

    public function __construct(){
    }
    function calculatePrice($qty ,$price)
    {
        self::$quantity+=$qty;
        self::$total_price+=$qty*$price;
        return round($qty*$price,2);
    }

    function calculateTax(){
        self::$tax=self::$total_price*TAX_PERCENTAGE;
        return  round(self::$tax,2);
    }
    function calculateTotalPrice(){
        return  round(self::$tax+ self::$total_price,2);
    }

    function toatlQty(){
        return round(self::$quantity,2);
    }
    
}
?>