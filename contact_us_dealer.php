<?php
include ("./views/header.php");
include("./views/signUp.php");
include("./views/login.php");
require_once  ("inc/Utility/db.php");
require_once  ("inc/Entities/ContactUs.class.php");

?>


<?php
	if(isset($_SESSION['company_name']))
	{
		extract($_REQUEST);  
		$db=new database();
		$db::initialize("ContactUs");
        $message=$db::getMessage($_SESSION['company_name']);
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
     
	}
	
	?>
	
<!--Footer-->
<?php
include ("./views/footer.php")
?>
