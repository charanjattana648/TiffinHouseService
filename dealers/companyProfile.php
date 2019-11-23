<?php
ob_start();
require_once("../requireFiles.php");
if((isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]==TRUE && $_SESSION['User_type']=="dealer") || ($_SESSION["loggedIn"]==TRUE && $_SESSION['User_type']=="admin"))
{
?>
<?php

$db=new database();
$db::initialize("CompanyProfile");
if(isset($_SESSION['company_name']))
{
    $com_detail=$db::getCompanyDetail($_SESSION['company_name']);
}else{
    $com_detail=$db::getCompanyDetail(); 
}
echo '<table><tr>
<th>CompanyName</th>
<th>PhoneNumber</th>
<th>Email</th>
<th>Address</th>
<th>City</th>
<th>Province</th>
<th>Country</th>
<th>PostalCode</th>
<th>CompanyImage</th>
<th>Action</th></tr>
';
foreach($com_detail as $cd)
{
    $classname=str_replace(' ', '',$cd->getCompanyName());
    echo'<tr class="'.$classname.'">    
    <td id="companyName">'.$cd->getCompanyName().'</td>
    <td id="phoneNumber">'.$cd->getPhoneNumber().'</td>
    <td id="email">'.$cd->getEmail().'</td>
    <td id="address">'.$cd->getAddress().'</td>
    <td id="city">'.$cd->getCity().'</td>
    <td id="province">'.$cd->getProvince().'</td>
    <td id="country">'.$cd->getCountry().'</td>     
    <td id="postalCode">'.$cd->getPostalCode().'</td>       
    <td id="itemImage">'.'<a href=""><img src="data:image/jpg;base64,'.base64_encode($cd->getCompanyImage()).'" style="height:50px;width:50px;"/> </a>'.'</td>
    <td id="x"><a class="edit_cprofile" id="'.$classname.'" href="#">edit</a></td></tr> ';
}
// var_dump($com_detail);

echo"</table>";

?>


<form id="dForm" method="Post" action="companyProfile.php" enctype="multipart/form-data">
    <label for="company_name">CompanyName</label>
	<input type="text" name="companyName" id="company_name" placeholder="enter companyName" readonly/><br>
    
    <label for="company_image">CompanyImage</label><br>
	<input type="file" name="companyImage" id="company_image" placeholder="enter companyImage"/><br>
	
    <label for="phone_number">PhoneNumber</label>
    <input type="tel" name="phoneNumber" id="phone_number" placeholder="enter phoneNumber"/><br>
    <label for="d_email">Email</label>
    <input type="email" name="email" id="d_email" placeholder="enter email"/><br>
    <label for="d_address">Address</label>
	<input type="text" name="address" id="d_address" placeholder="enter address"/><br>

	

	<label for="d_city">City</label>
	<input type="text" name="city" id="d_city" placeholder="enter city"/><br>
    
    <select name="province" id="d_province">
    <option value="">Select province</option>
    <option value="BC">BC</option>
    <option value="AB">AB</option>
</select>
<select name="country" id="d_country">
    <option value="">Select country</option>
    <option value="Canada">Canada</option>
</select><br><br>

    <label for="postal_code">PostalCode</label>
    <input type="text" name="postalCode" id="postal_code" placeholder="enter postalCode XXX XXX"/><br>
	
    <button type="submit" name="submitProfile" id="add_Profile">Add Profile</button>    
    <button type="submit" name="updateProfile" id="update_Profile">Update Profile</button>
    <button type="submit" name="deleteProfile" id="delete_Profile">Delete Profile</button>
	
</form>
<?php
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../inc/controller/CompanyProfile_dealer.js"></script>';

if(isset($_POST['submitProfile']))
{
    $cp=new CompanyProfile();
    $binary = file_get_contents($_FILES['companyImage']['tmp_name']);
    $cp->setData($_POST['companyName'],$_POST["phoneNumber"],
    $_POST['email'],$_POST['address'],$_POST['city'],$_POST['province'],
    $_POST['country'],$_POST['postalCode'],$binary);
    $db=new database();

    $db::initialize("CompanyProfile");
    $mealName=$db::setCompanyDetail($cp);
}else if(isset($_POST['updateProfile']))
{
    $cp=new CompanyProfile();
    if(!empty($_FILES['companyImage']['tmp_name']))
    {
        $binary = file_get_contents($_FILES['companyImage']['tmp_name']);
        $cp->setData($_POST['companyName'],$_POST["phoneNumber"],
        $_POST['email'],$_POST['address'],$_POST['city'],$_POST['province'],
        $_POST['country'],$_POST['postalCode'],$binary);
      }else{
        $cp->setData($_POST['companyName'],$_POST["phoneNumber"],
    $_POST['email'],$_POST['address'],$_POST['city'],$_POST['province'],
    $_POST['country'],$_POST['postalCode'],"");
    }   
    $db=new database();
    $db::initialize("CompanyProfile");
    $mealName=$db::updateCompanyDetail($cp);
}else if(isset($_POST['deleteProfile']))
{
    if(!empty($_POST['CompanyProfile']))
    {
        $db=new database();
        $db::initialize("CompanyProfile");
        $db::getCompanyDetail($_POST['companyName']);
        echo '<script> alert("Item deleted successfully!");</script>';
    }
    else{
        echo '<script> alert("Item cannot be deleted without companyName!!");</script>';
    }   
}
?>

<?php include (".././views/footer.php");

}
else{
   header("Location: http://localhost/index.php");
}
?>