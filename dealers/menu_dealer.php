<?php

/**
 * checks if dealer is signed In.
 * else redirect back to home page.
 */
ob_start();
require_once("../requireFiles.php");
if ((isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == TRUE && $_SESSION['User_type'] == "dealer") || ($_SESSION["loggedIn"] == TRUE && $_SESSION['User_type'] == "admin")) {
    ?>

    <?php
        /**
         * shows data added by dealer in table and 
         * edit option is added at last columns to edit data of particular row.
         */

        $db = new database();
        $db::initialize("Menu");
        if (isset($_SESSION['company_name'])) {
            $menu = $db::getMeal($_SESSION['company_name']);
        } else {

            $menu = $db::getMeal();
        }

        echo '<table id="menu_d_table"><tr>
        <td>Id</td>
        <td>Day</td>
        <td>ItemName</td>
        <td>ItemPrice</td>
        <td>ItemImage</td>
        <td>ItemDetail</td>
        <td>Ingredients</td>
        <td>Action</td> 
        </tr>';
        foreach ($menu as $m) {
            // echo "".$m->getItemId();
            echo '<tr class="' . $m->getItemId() . '">
      <td id="menuId">' . $m->getItemId() . '</td>
      <td id="day" class="' . $m->getDayId() . '">' . $m->getDay() . '</td>
      <td id="itemName">' . $m->getItemName() . '</td>
      <td id="itemPrice">' . $m->getItemPrice() . '</td>
      <td id="itemImage">' . '<a href=""><img src="data:image/jpg;base64,' . base64_encode($m->getItemImage()) . '" style="height:50px;width:50px;"/> </a>' . '</td>
      <td id="itemDetail">' . $m->getItemDetail() . '</td>
      <td id="ingredient">' . $m->getIngredient() . '</td>       
      <td id="x"><a class="edit_menu" id="' . $m->getItemId() . '" href="#dForm">edit</a></td></tr> ';
        }
        echo "</table>";
        ?>
    <div id="dealerMenu">
        <div>
            <!-- form for dealer to add delete upadte meals and ingredients -->
            <form id="dForm" method="Post" action="http://localhost/dealers/menu_dealer.php" enctype="multipart/form-data">
                <label for="itemId">ItemId</label>
                <input type="text" name="itemId" id="itemId" readonly /><br>
                <input type="radio" name="isOffer" id="regular" value="no" checked />
                <label for="regular">Regular offer</label>
                <input type="radio" name="isOffer" id="onDiscount" value="yes" />
                <label for="onDiscount">Add to Daily Offer</label><br>

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
                <input type="text" name="itemName" id="itemName" placeholder="enter itemName" /><br>


                <label for="itemPrice">ItemPrice</label>
                <input type="text" name="itemPrice" id="itemPrice" placeholder="enter itemPrice" /><br>


                <label for="itemImage">ItemImage</label><br>
                <input type="file" name="itemImage" id="itemImage" placeholder="enter itemImage" /><br>

                <label for="itemDetail">ItemDetail</label>
                <input type="text" name="itemDetail" id="itemDetail" placeholder="enter itemDetail" /><br>


                <label id="ing_l" for="ingredient">ingredient</label>
                <input type="text" name="ingredient" id="ingredient" placeholder="enter ingredient" />
                <input type="text" name="ingredient_data" id="ing_data" /><br>
                <button type="submit" name="submitIngredient" id="add_ingredient">Add Ingredient</button>



                <button type="submit" name="submitItem" id="add_item">Add Item</button>
                <button type="submit" name="getItem">Get Item</button>
                <button type="submit" name="deleteItem">Delete Item</button>
                <button type="submit" name="updateItem">Update Item</button>

            </form>
        </div>
    </div>
    <article>

        <?php
            echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../inc/controller/menu_dealer.js"></script>';

            if (isset($_POST['submitItem'])) {
                if ($_POST['isOffer'] == "no") { } else { }
                $menu = new Menu();
                $menu_day_array = explode(":", $_POST['day']);
                $binary = file_get_contents($_FILES['itemImage']['tmp_name']);
                $menu->saveMenu(
                    $_POST['itemName'],
                    $_POST['itemPrice'],
                    $binary,
                    $_POST['itemDetail'],
                    $_POST['ingredient_data'],
                    $menu_day_array[0],
                    $menu_day_array[1],
                    $_SESSION['company_name']
                );
                $db = new database();
                $db::initialize("Menu");
                $mealName = $db::addMeal($menu);
            }
            if (isset($_POST['updateItem'])) {
                if ($_POST['isOffer'] == "no") { } else { }
                $menu = new Menu();
                $menu_day_array = explode(":", $_POST['day']);
                if (!empty($_FILES['itemImage']['tmp_name'])) {
                    $binary = file_get_contents($_FILES['itemImage']['tmp_name']);
                    $menu->saveMenu(
                        $_POST['itemName'],
                        $_POST['itemPrice'],
                        $binary,
                        $_POST['itemDetail'],
                        $_POST['ingredient_data'],
                        $menu_day_array[0],
                        $menu_day_array[1],
                        $_SESSION['company_name'],
                        $_POST['itemId']
                    );
                } else {
                    $menu->saveMenu(
                        $_POST['itemName'],
                        $_POST['itemPrice'],
                        "",
                        $_POST['itemDetail'],
                        $_POST['ingredient_data'],
                        $menu_day_array[0],
                        $menu_day_array[1],
                        $_SESSION['company_name'],
                        $_POST['itemId']
                    );
                }
                $db = new database();
                $db::initialize("Menu");
                $mealName = $db::updateMeal($menu);
            }
            if (isset($_POST['deleteItem'])) {
                if (!empty($_POST['itemId'])) {
                    $db = new database();
                    $db::initialize("Menu");
                    $mealName = $db::deleteMeal((int) $_POST['itemId']);
                    echo '<script> alert("Item deleted successfully!");</script>';
                } else {
                    echo '<script> alert("Item cannot be deleted without item id!!");</script>';
                }
            }

            ?>

    </article>
    <p></p>

<?php include(".././views/footer.php");
} else {
    header("Location: http://localhost/index.php");
}
?>