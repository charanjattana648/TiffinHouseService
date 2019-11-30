<?php
require_once("../requireFiles.php");
/**set the heading of Menu with dealer company name selected */
?>
<h2 class="menuHead">Company Name: <?php if (isset($_GET['cname'])) {
                                      echo $_GET['cname'] . " ";
                                    } else {
                                      echo "Happy ";
                                    } ?>Menu</h2>
<?php

/**initialize the database with class Menu */
$db = new database();
$db::initialize("Menu");
$menu = "";
if (isset($_GET['cname'])) {
  $c_name = str_ireplace("%20", " ", $_GET['cname']);
  $menu = $db::getMeal($c_name);
} else {
  $menu = $db::getMeal("Happy");
}
$days = array();
$isNewDay = true;
$i = 0;
echo ' <div id="menu_div">';
foreach ($menu as $m) {
  if (in_array($m->getDay(), $days)) {
    $isNewDay = false;
  } else {
    array_push($days, $m->getDay());
    $isNewDay = true;
    $i = 0;
  }
  $i++;
  /**display menu by getting data from database */
  if ($isNewDay) {
    echo '<div class="menutable"><div id="day_id">' . $m->getDay() . '</div>';
  }
  if ($m->getItemImage() != null) {
    $itemName = preg_replace('/\s/', '_', $m->getItemName());
    echo '<a id="menu_items" href="#' . $itemName . '"><img src="data:image/jpg;base64,' . base64_encode($m->getItemImage()) . '"/> </a>';
  }
  echo '<div class="hover_menu_img">
    <p>' . $m->getItemName() . ' </p>
    <p class="' . $itemName . '">$' . $m->getItemPrice() . '</p>';
  echo ' </div>';
  if ($i == 3) {
    echo ' </div>';
  }
}
echo ' </div>';
/**displays more detail of menu item and initially it is hidden but will only display when button is clicked */
foreach ($menu as $m) {
  $itemName = preg_replace('/\s/', '_', $m->getItemName());
  echo '<section id="' . $itemName . '" class="vegMenu">
<section class="leftphoto">
<img style="height: 250px; width: 260px;" src="data:image/jpg;base64,' . base64_encode($m->getItemImage()) . '"/>
</section>
<section class="righttext">
<h1>' . $m->getItemName() . '</h1><p>' . $m->getItemDetail() . '</p>
<h3>Ingredients</h3><ul>';
  /** explodes string into array */
  $ingredients = explode(",", $m->getIngredient());
  foreach ($ingredients as $i) {
    echo '<li>' . $i . '</li>';
  }
  echo '</ul>
<span>Enter Quantity</span>
<input type="number" min="0" name="qtyItem" id="qty_item" value="0" placeholder="enter qty" />
<button type="submit" class="mi_to_cart" name="mi_to_cart" id="' . $itemName . '">Add to Cart</button>
</section>
</section>';
}
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>';

echo '<script src="../inc/controller/menu.js"></script>'
?>


<!--Footer-->
<?php

include("../views/footer.php");
?>