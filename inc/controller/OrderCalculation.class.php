<?php
/**
 * Order class
 */
class Order
{
    /**
     * static variable stores initial value 0;
     */
    private static $total_price = 0;
    private static $tax = 0;
    public static $quantity = 0;

    /**
     * constructor
     */
    public function __construct()
    { }
    /**
     * calculatePrice method returns total item price by multipling with qty
     */
    function calculatePrice($qty, $price)
    {
        self::$quantity += $qty;
        self::$total_price += $qty * $price;
        return round($qty * $price, 2);
    }

    /**
     * calculateTax() method calculated tax
     */
    function calculateTax()
    {
        self::$tax = self::$total_price * TAX_PERCENTAGE;
        return  round(self::$tax, 2);
    }
    /**
     * calculateTotalPrice() method calculates total price
     */
    function calculateTotalPrice()
    {
        return  round(self::$tax + self::$total_price, 2);
    }

    /**
     * calculated total qty by storing in static variable
     */
    function toatlQty()
    {
        return round(self::$quantity, 2);
    }

    /**
     * empties the cart
     */
    function emptyCart()
    {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time() - 1000);
                setcookie($name, '', time() - 1000, '/');
            }
        }
    }
}
?>