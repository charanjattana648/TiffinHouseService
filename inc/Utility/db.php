
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
        $menu_query="SELECT * FROM TiffinHouseDb.Menu";
        if(!empty($companyName))
        {
            $menu_query="SELECT * FROM TiffinHouseDb.Menu Where companyName=?";            
        }
        try{
            $menu=new Menu1();
            self::$db->query($menu_query);
            self::$db->execute();
          //  var_dump(self::$db->resultSet());
            $menu=self::$db->resultSet();

            return $menu;
        }catch(PDOException $err)
        {
            echo "Error : ".$err->getMessage();
        }


    }

}



?>