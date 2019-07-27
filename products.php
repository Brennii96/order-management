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
    <?php include_once 'icons.php'; ?>
    <title>Products </title>
</head>
<body>
<?php include 'header.php'; ?>
<div class="ui container">
    <h1>Products</h1>
    <table class="ui large table">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($products->results() as $product) {
            echo "<tr>
                        <td>" . $product->product_name . "</td>
                        <td>" . $product->description . "</td>
                        <td>
                        <a href='delete-product.php?id=".$product->products_id."'>
                        <button class=\"ui icon negative button\">
                            <i class=\"trash icon\"></i>
                        </button></a>
                        </td>
                      </tr>";
        } ?>
        </tbody>
        <tfoot>
        <tr>
            <th><?php echo $products->count(); ?> Products</th>
            <th></th>
            <th>
                <a href="create-product.php">
                    <button class="ui button right-aligned">Create Product</button>
                </a>
            </th>
        </tr>
        </tfoot>
    </table>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
