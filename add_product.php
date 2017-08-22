<?php
    $category_id = $_POST['category_id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    if(empty($code) || empty($name) || empty($price)){
        $error = "Du lieu khong hop le";
    }else{
        require_once ('database.php');
        $query = "insert into products
                  (categoryID, productCode, ProductName, listPrice)
                  VALUE 
                  ('$category_id','$code','$name', '$price')";
        $db ->exec($query);
        include ('index.php');
    }
?>