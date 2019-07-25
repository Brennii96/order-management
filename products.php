<?php
require_once 'core/init.php';
$products = DB::getInstance()->query('SELECT * FROM products;');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'icons.php'; ?>
    <title>Document</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class="ui container">
    <h1>Products</h1>
    <div class="ui column">
        <?php foreach ($products->results() as $product) {
            echo $product->product_name . "<br>";
        } ?>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
