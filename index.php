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
        <?php $needsDespatching = DB::getInstance()->query("SELECT * FROM `products_to_order` CROSS JOIN `orders` WHERE `status` = 'Awaiting Despatch' AND `despatch_date` < current_date();")->results(); ?>
        <table class="ui large table">
            <thead>
            <tr>
                <th>Client</th>
                <th>Status</th>
                <th>Payment Method</th>
                <th>Despatch Date</th>
                <th>Description</th>
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
            </tr>
            </tfoot>
        </table>
    </div>
    <?php include_once 'footer.php'; ?>
</body>
</html>