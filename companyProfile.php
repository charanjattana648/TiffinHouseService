<?php
include("./views/header.php");
require_once("./inc/Entities/CompanyProfile.class.php");
require_once("./inc/Utility/db.php");

?>


<form id="dForm" method="Post" action="companyProfile.php" enctype="multipart/form-data">
<label for="itemId">ItemId</label>
	<input type="text" name="itemId" id="itemId" readonly/><br>
<select name="day" id="day">
    <option value="">Select Day</option>
    <option value="Monday:1">Monday</option>
    <option value="Tuesday:2">Tuesday</option>
    <option value="Wednesday:3">Wednesday</option>
    <option value="Thrusday:4">Thrusday</option>
    <option value="Friday:5">Friday</option>
    <option value="Saturday:6">Saturday</option>
    <option value="Sunday:7">Sunday</option>
</select><br><br>
<label for="itemName">ItemName</label>
	<input type="text" name="itemName" id="itemName" placeholder="enter itemName"/><br>
	
	
	<label for="itemPrice">ItemPrice</label>
	<input type="text" name="itemPrice" id="itemPrice" placeholder="enter itemPrice"/><br>
	
	
	<label for="itemImage">ItemImage</label><br>
	<input type="file" name="itemImage" id="itemImage" placeholder="enter itemImage"/><br>
	
	<label for="itemDetail">ItemDetail</label>
	<input type="text" name="itemDetail" id="itemDetail" placeholder="enter itemDetail"/><br>
	
	
	<label for="ingredient">ingredient</label>
	<input type="text" name="ingredient" id="ingredient" placeholder="enter ingredient"/>
    <input type="text" name="ingredient_data" id="ing_data"/>
	<button type="submit" name="submitIngredient" id="add_ingredient">Add Ingredient</button>
	
    <button type="submit" name="submitItem" id="add_item">Add Item</button>
    <button type="submit" name="getItem">Get Item</button>
    <button type="submit" name="deleteItem">Delete Item</button>
    <button type="submit" name="updateItem">Update Item</button>
	
<!--itemName	itemPrice	itemImage	itemDetail	ingredient	day-->

</form>

<?php
include("./views/footer.php");
?>