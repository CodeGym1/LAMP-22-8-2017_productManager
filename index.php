<?php
require 'database.php';
$category_id=1;

if(isset($_GET['category_id'])){
    $category_id=$_GET['category_id'];
}
$query = "select * from categories
              where categoryID=$category_id";
$category = $db->query($query);
$category = $category->fetch();
$category_name= $category['categoryName'];
$query = 'select * from categories
              order by categoryID';
$categories=$db->query($query);
$query = "Select * from products
              Where categoryID=$category_id
              ORDER  by productID";

$products = $db->query($query);

?>

<html>
<head>
    <title> My guiter Shop</title>
    <link href="main.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="page">
    <div id="header">
        <h1>Produce Manager</h1>
    </div>
    <div id="main">
        <h1>Product List</h1>
    </div>
        <div id="sidebar">
            <h2>Danh mục sản phẩm</h2>
            <ul class="nav">
                <?php foreach ($categories as $category):?>
                    <li>
                        <a href="?category_id=<?php echo $category['categoryID']; ?>">
                            <?php echo $category['categoryName']?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <div id="content">
        <h2> <?php echo $category_name?></h2>
        <table>
            <tr>
                <th>Thể loại</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($products as $product):?>
            <tr>
                <td> <?php echo $product['productCode']?></td>
                <td> <?php echo $product['productName']?></td>
                <td> <?php echo $product['listPrice']?></td>
                <td>
                    <form action="delete_product.php" method="post" id="delete_product_form">
                        <input type="hidden" name="product_id" value=" <?php echo $product['productID']?>">
                        <input type="hidden" name="category_id" value=" <?php echo $product['categoryID']?>">
                        <input type="submit" value="delete">
                    </form>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
        <p><a href="add_product_form.php">Thêm sản phem mới</a></p>
    </div>
    <div id="footer">
        <p>&copy;<?php echo date("y")?> My guiter shop</p>
    </div>
    </div>
</body>
</html>
