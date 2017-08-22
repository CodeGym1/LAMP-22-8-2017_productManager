<?php
    require ('database.php');
    $query = 'select * from categories
              order by categoryID';
    $categories = $db -> query($query);

?>
<html>
<head>
    <title> My guiter shop</title>
    <link rel="stylesheet" href="main.css " type="text/css">
</head>
<body>
<div id="page">
    <div id="header">
        <h1> Product Manager</h1>
    </div>
    <div id="main">
        <h1>Add product</h1>
        <form action="add_product.php" method="post">
            <div>
            <label> Danh muc san pham: </label>
            <select name=" category_id">
                <?php foreach ($categories as $category):?>
                <option value=" <?php echo $category['categoryID'];?>">
                    <?php echo $category['categoryName']?>
                </option>
                <?php endforeach;?>
            </select>
            </div>
            <br/>
            <div>
            <label> The loai</label>
            <input type="input" name="code">
            </div>
            <br>
            <div>
            <label> Ten san pham</label>
            <input type="input" name="name">
            </div>
            <br>
            <div>
            <label> Gia</label>
            <input type="input" name="price">
            </div>
            <br>
            <label>&nbsp;</label>
            <input type="submit" value="Them san pham">
            <br>
            <p><a href="index.php"> View product List</a></p>

        </form>

    </div>
    <div id="footer">
        <p>&copy;<?php echo date("y")?> My guiter shop</p>
    </div>
</div>
</body>
</html>
