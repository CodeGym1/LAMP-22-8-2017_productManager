<?php
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    require_once ('database.php');
    $query = "delete from products
              Where productID = '$product_id'";
    $db -> exec($query);
    include ('index.php');
?>