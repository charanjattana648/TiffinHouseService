<?php
include("./views/header.php");
require_once("./inc/Entities/AboutUS.class.php");
require_once("./inc/Utility/db.php");

echo'<table><tr>
     <th>Company Name</th>
     <th>About Company</th>
     <th>edit</th>
     </tr>';
     $db=new database();
     $db::initialize("AboutUS");
    $company=$db::getAboutCompany(isset($_SESSION['companyName']));

    //var_dump($company);
    foreach($company as $c)
    {
        echo '<tr class="'.$c->getCompanyName().'">
        <td id="cName">'.$c->getCompanyName().'</td>
        <td id="aCompany">'.$c->getAboutCompany().'</td>
        <td id="x"><a class="edit_aboutUs" id="'.$c->getCompanyName().'" href="#">edit</a></td>
        </tr>';
    }
    echo"</table>";
    
?>

<form method="Post" action="about_us_dealer.php">
    <label for="company_Name">Company Name</label>
    <input type="text" name="company_Name" value="<?php if(isset($_SESSION['companyName'])) { $_SESSION['companyName']; }?>" id="company_Name" readOnly/>
    <label for="about_Company">About Company</label><br>
    <TextArea name="about_Company" id="about_Company" rows="6" cols="80" ></TextArea>
    <button type="submit" name="add_aboutUs" id="add_aboutUs">ADD</button>
    <button type="submit" name="update_aboutUs" id="update_aboutUs">Update</button>
</form>
<?php
if(isset($_POST['add_aboutUs']))
{
    $db=new database();
    $db::initialize("AboutUS");
   $company=$db::addAboutCompany($_POST['company_Name'],$_POST['about_Company']);
}else if(isset($_POST['update_aboutUs']))
{
    $db=new database();
    $db::initialize("AboutUS");
   $company=$db::updateAboutCompany($_POST['company_Name'],$_POST['about_Company']);
}

echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="./inc/controller/about_us_dealer.js"></script>';

?>

<?php
include("./views/footer.php");
?>