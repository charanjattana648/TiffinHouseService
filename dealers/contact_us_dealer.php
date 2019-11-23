<?php
ob_start();
require_once("../requireFiles.php");
if((isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]==TRUE && $_SESSION['User_type']=="dealer") || ($_SESSION["loggedIn"]==TRUE && $_SESSION['User_type']=="admin"))
{
?>

<?php
	
		extract($_REQUEST);  
		$db=new database();
        $db::initialize("ContactUs");
        if(isset($_SESSION['company_name']))
	{
        $message=$db::getMessage($_SESSION['company_name']);
    }else{
        $message=$db::getMessage("");
    }
       // var_dump($message);
        echo '<table><tr>
        <th>messageTo</th>
        <th>firstName</th>
        <th>lastName</th>
        <th>userEmail</th>
        <th>message</th>
        <th>dateTime</th>';
        

        foreach($message as $m)
        {
            echo '<tr>
            <td>'.$m->getMessageTo().'</td>   
            <td>'.$m->getFirstName().'</td> 
            <td>'.$m->getLastName().'</td> 
            <td><a href="mailto:'.$m->getUserEmail().'">'.$m->getUserEmail().'</a></td> 
            <td>'.$m->getMessage().'</td> 
            <td>'.$m->getDateTime().'</td>            
            </tr>';
        }
        echo "</table>";
     
	
	?>
	
<!--Footer-->
<?php include (".././views/footer.php");

}
else{
   header("Location: http://localhost/index.php");
}
?>
