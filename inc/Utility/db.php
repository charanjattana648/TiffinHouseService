
<?php

// require_once  ("./inc/Entities/MenuD.class.php");
require_once ("PDOAgent.class.php");
class database{

    private static $db;
    public static function initialize(string $className)
    {
        self::$db=new PDOAgent($className);
    }

    public static function getMeal(string $companyName="")
    {
        $menu_query="SELECT * FROM TiffinHouseDb.Menu order by day";
        if(!empty($companyName))
        {
            $menu_query="SELECT * FROM TiffinHouseDb.Menu Where companyName=?";            
        }
        try{
            $menu=new Menu();
            self::$db->query($menu_query);
            self::$db->execute();
            $menu=self::$db->resultSet();

            return $menu;
        }catch(PDOException $err)
        {
            echo "Error : ".$err->getMessage();
        }


    }

    public static function addMeal(Menu $menu)
    {
        $menu_add_query="INSERT INTO TiffinHouseDb.Menu (itemName, itemPrice, itemImage,itemDetail, ingredient, day, companyName, dayId)
         VALUES (:itemName,:itemPrice,:itemImage,:itemDetail,:ingredient,:day,:companyName,:dayId)";
         try{
             self::$db->query($menu_add_query);
             self::$db->bind(':itemName',$menu->getItemName());
             self::$db->bind(':itemPrice',$menu->getItemPrice());
             self::$db->bind(':itemImage',$menu->getItemImage());
             self::$db->bind(':itemDetail',$menu->getItemDetail());
             self::$db->bind(':ingredient',$menu->getIngredient());
             self::$db->bind(':day',$menu->getDay());
             self::$db->bind(':companyName',"Happy");
             self::$db->bind(':dayId',$menu->getDayId());
             self::$db->execute();
         }catch(PDOException $err)
         {
            echo "Error : ".$err->getMessage();
         }
    }

    public static function deleteMeal($id)
    {
        $menu_delete_query="DELETE FROM  TiffinHouseDb.Menu WHERE menuId=:id";
        try{
            self::$db->query($menu_delete_query);
            self::$db->bind(':id',$id);
            self::$db->execute();
        }catch(PDOException $err)
        {
           echo "Error : ".$err->getMessage();
        }
    }
    public static function updateMeal(Menu $menu)
    {         
        $menu_add_query="UPDATE TiffinHouseDb.Menu SET itemName=:itemName,itemPrice=:itemPrice,itemImage=:itemImage,itemDetail=:itemDetail,
        ingredient=:ingredient,day=:day,companyName=:companyName,dayId=:dayId where menuId=:menuId";
         try{
             self::$db->query($menu_add_query);
             self::$db->bind(':menuId',$menu->getItemId());
             self::$db->bind(':itemName',$menu->getItemName());
             self::$db->bind(':itemPrice',$menu->getItemPrice());
             self::$db->bind(':itemImage',$menu->getItemImage());
             self::$db->bind(':itemDetail',$menu->getItemDetail());
             self::$db->bind(':ingredient',$menu->getIngredient());
             self::$db->bind(':day',$menu->getDay());
             self::$db->bind(':companyName',"Happy");
             self::$db->bind(':dayId',$menu->getDayId());
             self::$db->execute();
         }catch(PDOException $err)
         {
            echo "Error : ".$err->getMessage();
         }
    }

}



?>