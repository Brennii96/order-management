<?php
require_once 'core/init.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Management</title>
    <?php include_once 'icons.php'; ?>
</head>
<body>
    <?php include_once 'header.php'; ?>
    <div class="ui container four">
        <div class="ui column">
            <div class="ui circular segment">
                <h2 class="ui header">
                    <?php echo DB::getInstance()->query("SELECT * FROM products;")->count(); ?> Products Available
                </h2>
            </div>
            <div class="ui circular segment">
                <h2 class="ui header">
                    <?php echo DB::getInstance()->query("SELECT * FROM orders")->count(); ?> Orders
                </h2>
            </div>
            <div class="ui circular segment">
                <h2 class="ui header">
                    <?php echo DB::getInstance()->query("SELECT * FROM clients;")->count(); ?> Clients
                </h2>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>
</body>
</html>