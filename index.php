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
    <div class="ui container">
        <?php if (Session::has('success')) { ?>
            <div class="ui success message">
                <i class="close icon"></i>
                <div class="header">
                    Success
                </div>
                <p><?php echo Session::get('success'); ?></p>
            </div>
        <?php } ?>
        <div class="ui column">
            <a href="products.php">
                <div class="ui circular segment">
                    <h2 class="ui header">
                        <?php echo DB::getInstance()->query("SELECT * FROM products;")->count(); ?> Products Available
                    </h2>
                </div>
            </a>
            <a href="orders.php">
                <div class="ui circular segment">
                    <h2 class="ui header">
                        <?php echo DB::getInstance()->query("SELECT * FROM orders")->count(); ?> Orders
                    </h2>
                </div>
            </a>
            <a href="clients.php">
                <div class="ui circular segment">
                    <h2 class="ui header">
                        <?php echo DB::getInstance()->query("SELECT * FROM clients;")->count(); ?> Clients
                    </h2>
                </div>
            </a>

        </div>
        <?php $needsDespatching = DB::getInstance()->query("SELECT * FROM `products_to_order` CROSS JOIN `orders` WHERE `status` = 'Awaiting Despatch';")->results(); ?>
        <?php if ($needsDespatching) { ?>
            <h2>Products Needs Despatching</h2>
        <table class="ui large table">
            <thead>
            <tr>
                <th>Client</th>
                <th>Status</th>
                <th>Payment Method</th>
                <th>Despatch Date</th>
                <th>Description</th>
                <th class="center aligned">Update Order Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($needsDespatching as $despatch) {
                $date = new DateTime( $despatch->despatch_date);
                echo "<tr>
                        <td>".DB::getInstance()->get('clients', array('clients_id', '=', $despatch->clients_id))->results()[0]->client_name."</td>                       
                        <td>".$despatch->status."</td>                       
                        <td>".$despatch->payment_method."</td>                       
                        <td class='error'>".$date->format('d F Y')."</td>                       
                        <td>".$despatch->description."</td>                       
                        <td class='center aligned'>
                            <a class='ui button' href='update-order.php?id=$despatch->orders_id'>Update</a>
                        </td>                       
                      </tr>";
            } ?>
            </tbody>
            <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th class="center aligned">Total awaiting despatch: <?php echo count($needsDespatching);?></th>
            </tr>
            </tfoot>
        </table>
        <?php } ?>
    </div>
    <?php include_once 'footer.php'; ?>
</body>
</html>
