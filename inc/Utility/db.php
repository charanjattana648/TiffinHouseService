
<?php

// require_once  ("./inc/Entities/MenuD.class.php");
require_once ("PDOAgent.class.php");
class database{

    private static $db;
    public static function initialize(string $className)
    {
        self::$db=new PDOAgent($className);
    }

    /**get all meals by company name */
    public static function getMeal(string $companyName="")
    {
        $menu_query="SELECT * FROM TiffinHouseDb.Menu order by dayId";
        if(!empty($companyName))
        {
            $menu_query="SELECT * FROM TiffinHouseDb.Menu Where companyName=:companyName order by dayId,ItemName desc";            
        }
        try{
            $menu=new Menu();
            self::$db->query($menu_query);
            if(!empty($companyName))
            {
                self::$db->bind(":companyName",$companyName);   
            }
            self::$db->execute();
            $menu=self::$db->resultSet();

            return $menu;
        }catch(PDOException $err)
        {
            echo "Error : ".$err->getMessage();
        }
    }
    /**getmeal by name for search function in future */
    public static function getMealByID(string $companyName="Happy", $itemName)
    {
        
        $search_item_query="SELECT * FROM TiffinHouseDb.Menu Where itemName like *.".$itemName.".*";            
        
        try{
            $menu=new Menu();
            self::$db->query($search_item_query);       
            self::$db->execute();
            $menu=self::$db->resultSet();

            return $menu;
        }catch(PDOException $err)
        {
            echo "Error : ".$err->getMessage();
        }
    }
/**Add meal */
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

    /**delete meal */
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
    /**Updating meal */
    public static function updateMeal(Menu $menu)
    {   
        $menu_update_query="UPDATE TiffinHouseDb.Menu SET itemName=:itemName,itemPrice=:itemPrice,itemDetail=:itemDetail,
        ingredient=:ingredient,day=:day,companyName=:companyName,dayId=:dayId where itemId=:itemId";   
        if($menu->getItemImage()!="")
        {
            $menu_update_query="UPDATE TiffinHouseDb.Menu SET itemName=:itemName,itemPrice=:itemPrice,itemImage=:itemImage,itemDetail=:itemDetail,
            ingredient=:ingredient,day=:day,companyName=:companyName,dayId=:dayId where itemId=:itemId";
        }
       
         try{
             self::$db->query($menu_update_query);
             self::$db->bind(':itemId',$menu->getItemId());
             self::$db->bind(':itemName',$menu->getItemName());
             self::$db->bind(':itemPrice',$menu->getItemPrice());
             if($menu->getItemImage()!="")
             {
             self::$db->bind(':itemImage',$menu->getItemImage());
             }
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
    /**function for Contact us message from user  */
    public static function sendMessage(ContactUs $contactUs)
    {
        $message_send_query="INSERT INTO TiffinHouseDb.contactus(messageTo,firstName,lastName, userEmail,message, dateTime)
         VALUES (:messageTo,:firstName,:lastName,:userEmail,:message,:dateTime)";
          try{
            self::$db->query($message_send_query);
            self::$db->bind(':messageTo',$contactUs->getMessageTo());
            self::$db->bind(':firstName',$contactUs->getFirstName());
            self::$db->bind(':lastName',$contactUs->getLastName());
            self::$db->bind(':userEmail',$contactUs->getUserEmail());
            self::$db->bind(':message',$contactUs->getMessage());
            self::$db->bind(':dateTime',$contactUs->getDateTime());
            self::$db->execute();
        }catch(PDOException $err)
        {
           echo "Error : ".$err->getMessage();
        }
    }

      /**function for Contact us message from user  */
      public static function getMessage(string $messageTo)
      {
          echo "message to : ".$messageTo;
          $message_query="SELECT * FROM TiffinHouseDb.contactus where messageTo=:messageTo order by dateTime desc";
          try{
              self::$db->query($message_query);
              self::$db->bind(':messageTo',$messageTo);
              self::$db->execute();
              $message=self::$db->resultSet();
              return $message;
          }catch(PDOException $err)
          {
             echo "Error : ".$err->getMessage();
          }
      }

      /**adding company detail in about page */
      public static function addAboutCompany(string $companyName,string $about)
      {
          $add_about_company_query="INSERT INTO TiffinHouseDb.about (companyName,aboutCompany)
                                 VALUES (:companyName,:about)";
           try{
               self::$db->query($add_about_company_query);
               self::$db->bind(':companyName',$companyName);
               self::$db->bind(':about',$about);
               self::$db->execute();
            }catch(PDOException $err)
            {
                echo "Error : ".$err->getMessage();
            }
      }
        /**adding company detail in about page */
        public static function updateAboutCompany(string $companyName,string $about)
        {
            $add_about_company_query="UPDATE TiffinHouseDb.about SET aboutCompany=:about 
            WHERE companyName=:companyName";
             try{
                 self::$db->query($add_about_company_query);
                 self::$db->bind(':companyName',$companyName);
                 self::$db->bind(':about',$about);
                 self::$db->execute();
              }catch(PDOException $err)
              {
                  echo "Error : ".$err->getMessage();
              }
        }

      /**getting company description in about page */
      public static function getAboutCompany(string $companyName="")
      {
          $get_about_company_query="Select * from TiffinHouseDb.about";
          if($companyName!="")
          {
              $get_about_company_query="Select * from TiffinHouseDb.about where companyName=:companyName";
          }
           try{
               self::$db->query($get_about_company_query);
               self::$db->bind(':companyName',$companyName);
               self::$db->execute();
               $about=self::$db->resultSet();
               return $about;
            }catch(PDOException $err)
            {
                echo "Error : ".$err->getMessage();
            }
      }

      /**adding company detail */
      public static function setCompanyDetail(CompanyProfile $cProfile)
      {
          $set_company_profile_query="INSERT INTO TiffinHouseDb.contactdetail(companyName, phoneNumber,email, address, city, Province, country, postalCode, companyImage)
           VALUES (:companyName, :phoneNumber,:email, :address, :city, :Province, :country, :postalCode, :companyImage)";
           try{
               self::$db->query($set_company_profile_query);
               self::$db->bind(':companyName',$cProfile->getCompanyName());
               self::$db->bind(':phoneNumber',$cProfile->getPhoneNumber());
               self::$db->bind(':email',$cProfile->getEmail());
               self::$db->bind(':address',$cProfile->getAddress());
               self::$db->bind(':city',$cProfile->getCity());
               self::$db->bind(':Province',$cProfile->getProvince());
               self::$db->bind(':country',$cProfile->getCountry());
               self::$db->bind(':postalCode',$cProfile->getPostalCode());
               self::$db->bind(':companyImage',$cProfile->getCompanyName());
               self::$db->execute();
           }catch(PDOException $err)
           {
               echo "Error : ".$err->getMessage();
           }
      }

      public static function updateCompanyDetail(CompanyProfile $cProfile)
      {
          $update_company_profile_query="UPDATE TiffinHouseDb.contactdetail SET phoneNumber=:phoneNumber ,email=:email, address=:address, city=:city, 
          province=:province;, country=:country, postalCode=:postalCode, companyImage=:companyImage WHERE companyName=:companyName";
          if($cProfile->getCompanyImage()=="")
          {
            $update_company_profile_query="UPDATE TiffinHouseDb.contactdetail SET phoneNumber=:phoneNumber ,email=:email, address=:address, city=:city, 
            province=:province;, country=:country, postalCode=:postalCode WHERE companyName=:companyName";
          }
           try{
               self::$db->query($update_company_profile_query);
               self::$db->bind(':companyName',$cProfile->getCompanyName());
               self::$db->bind(':phoneNumber',$cProfile->getPhoneNumber());
               self::$db->bind(':email',$cProfile->getEmail());
               self::$db->bind(':address',$cProfile->getAddress());
               self::$db->bind(':city',$cProfile->getCity());
               self::$db->bind(':Province',$cProfile->getProvince());
               self::$db->bind(':country',$cProfile->getCountry());
               self::$db->bind(':postalCode',$cProfile->getPostalCode());
               if($cProfile->getCompanyImage()!="")
                 {
                  self::$db->bind(':companyImage',$cProfile->getCompanyImage());
                 }
               self::$db->execute();
           }catch(PDOException $err)
           {
               echo "Error : ".$err->getMessage();
           }
      }

      public static function getCompanyDetail(string $companyName="")
      {
          $get_company_profile_query="SELECT * FROM TiffinHouseDb.contactdetail WHERE companyName=:companyName";
          if($companyName=="")
          {
            $get_company_profile_query="SELECT * FROM TiffinHouseDb.contactdetail"; 
          }
           try{
               self::$db->query($get_company_profile_query);
               if($companyName!="")
               {
               self::$db->bind(':companyName',$companyName);
               }
               self::$db->execute();
               return self::$db->resultSet();
           }catch(PDOException $err)
           {
               echo "Error : ".$err->getMessage();
           }
      }

      /**Delete Company Detail */
      public static function deleteCompanyDetail(string $companyName)
      {
          $delete_company_profile_query="DELETE FROM TiffinHouseDb.contactdetail WHERE companyName=:companyName";
         try{
               self::$db->query($delete_company_profile_query);
               self::$db->bind(':companyName',$companyName);
               self::$db->execute();
           }catch(PDOException $err)
           {
               echo "Error : ".$err->getMessage();
           }
      }






   /**get all daily offers by company name */
   public static function getDailyOffer(string $companyName="")
   {
       $daily_offer_query="SELECT * FROM TiffinHouseDb.dailyoffer";
       if(!empty($companyName))
       {
           $daily_offer_query="SELECT * FROM TiffinHouseDb.dailyoffer Where companyName=?";            
       }
       try{
           $dailyOffer=new Menu();
           self::$db->query($daily_offer_query);
           self::$db->execute();
           $dailyOffer=self::$db->resultSet();
           return $dailyOffer;
       }catch(PDOException $err)
       {
           echo "Error : ".$err->getMessage();
       }
   }

   //itemId	companyName	itemName	itemDetail	itemPrice	itemImage
  
/**Add dailyOffer */
   public static function addOffer(Menu $menu)
   {
       $dailyoffer_add_query="INSERT INTO TiffinHouseDb.dailyoffer (itemName, itemPrice, itemImage,itemDetail, companyName)
        VALUES (:itemName,:itemPrice,:itemImage,:itemDetail,:companyName)";
        try{
            self::$db->query($dailyoffer_add_query);
            self::$db->bind(':itemName',$menu->getItemName());
            self::$db->bind(':itemPrice',$menu->getItemPrice());
            self::$db->bind(':itemImage',$menu->getItemImage());
            self::$db->bind(':itemDetail',$menu->getItemDetail());
            self::$db->bind(':companyName',"Happy");
            self::$db->execute();
        }catch(PDOException $err)
        {
           echo "Error : ".$err->getMessage();
        }
   }

   /**delete offer */
   public static function deleteOffer($id)
   {
       $dailyoffer_delete_query="DELETE FROM  TiffinHouseDb.dailyoffer WHERE itemId=:id";
       try{
           self::$db->query($dailyoffer_delete_query);
           self::$db->bind(':id',$id);
           self::$db->execute();
       }catch(PDOException $err)
       {
          echo "Error : ".$err->getMessage();
       }
   }
   /**Updating offer */
   public static function updateOffer(Menu $menu)
   {   
       $dailyoffer_update_query="UPDATE TiffinHouseDb.dailyoffer SET itemName=:itemName,itemPrice=:itemPrice,itemDetail=:itemDetail,
       companyName=:companyName where itemId=:itemId";   
       if($menu->getItemImage()!="")
       {
           $dailyoffer_update_query="UPDATE TiffinHouseDb.dailyoffer SET itemName=:itemName,itemPrice=:itemPrice,itemImage=:itemImage,itemDetail=:itemDetail,
           companyName=:companyName where itemId=:itemId";
       }
      
        try{
            self::$db->query($dailyoffer_update_query);
            self::$db->bind(':itemId',$menu->getItemId());
            self::$db->bind(':itemName',$menu->getItemName());
            self::$db->bind(':itemPrice',$menu->getItemPrice());
            if($menu->getItemImage()!="")
            {
            self::$db->bind(':itemImage',$menu->getItemImage());
            }
            self::$db->bind(':itemDetail',$menu->getItemDetail());
            self::$db->bind(':companyName',"Happy");
            self::$db->execute();
        }catch(PDOException $err)
        {
           echo "Error : ".$err->getMessage();
        }
   }

/**get tiffin plan */
public static function getTiffinPlan(string $companyName)
{
    
    $search_item_query="SELECT * FROM TiffinHouseDb.MealPlan Where companyName=:companyName order by subscriptionType desc, price ";            
    
    try{
        $meal=new MealPlan();
        self::$db->query($search_item_query);          
        self::$db->bind(':companyName',$companyName);     
        self::$db->execute();
        $meal=self::$db->resultSet();
        return $meal;
    }catch(PDOException $err)
    {
        echo "Error : ".$err->getMessage();
    }
}
/**Add meal */
public static function addMealPlan(MealPlan $mealplan)
{
    //INSERT INTO `MealPlan`(`companyName`, `tiffinType`, `price`, `tiffinDescription`, `subscriptionType`)
    $meal_add_query="INSERT INTO TiffinHouseDb.MealPlan (companyName, tiffinType, price,tiffinDescription, subscriptionType)
     VALUES (:companyName,:tiffinType,:price,:tiffinDescription,:subscriptionType)";
     try{
         self::$db->query($meal_add_query);
         self::$db->bind(':companyName',$menu->getCompanyName());
         self::$db->bind(':tiffinType',$menu->getTiffinType());
         self::$db->bind(':price',$menu->getPrice());
         self::$db->bind(':tiffinDescription',$menu->getTiffinDescription());
         self::$db->bind(':subscriptionType',$menu->getSubscriptionType());
         self::$db->execute();
     }catch(PDOException $err)
     {
        echo "Error : ".$err->getMessage();
     }
}

/**delete tiffin plan*/
public static function deleteMealPlan($companyName,$tiffinType,$subscriptionType)
{
    $meal_delete_query="DELETE FROM  TiffinHouseDb.Menu WHERE companyName=:companyName and tiffinType=:tiffinType and subscriptionType=:subscriptionType ";
    try{
        self::$db->query($meal_delete_query);
        self::$db->bind(':companyName',$companyName);
        self::$db->bind(':tiffinType',$tiffinType);
        self::$db->bind(':subscriptionType',$subscriptionType);
        self::$db->execute();
    }catch(PDOException $err)
    {
       echo "Error : ".$err->getMessage();
    }
}

}







?>