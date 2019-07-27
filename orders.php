<?php
require_once 'core/init.php';
$orders = DB::getInstance()->query("SELECT * FROM orders;");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once 'icons.php'; ?>
    <title>Orders | Order Management</title>
</head>
<body>
<?php include_once 'header.php'; ?>
<div class="ui container">
    <h1>Orders</h1>
    <table class="ui large table">
        <thead>
        <tr>
            <th>Order Status</th>
            <th>Payment Method</th>
            <th>Date / Time</th>
            <th>Descriptions</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($orders->results() as $order) {
            $date = new DateTime( $order->date_time);
            echo "<tr>
                        <td>" . $order->status . "</td>
                        <td>" . $order->payment_method. "</td>
                        <td>" . $date->format('d F Y, h:i:s A') . "</td>
                        <td>" . $order->description. "</td>
                        <td>
                        <a href='delete-order.php?id=".$order->orders_id."'>
                        <button class=\"ui icon negative button\">
                            <i class=\"trash icon\"></i>
                        </button></a>
                        </td>
                      </tr>";
        } ?>
        </tbody>
        <tfoot>
        <tr>
            <th><?php echo $orders->count(); ?> Orders</th>
            <th></th>
            <th></th>
            <th></th>
            <th>
                <a href="create-order.php">
                    <button class="ui button right-aligned">Create Order</button>
                </a>
            </th>
        </tr>
        </tfoot>
    </table>
</div>
</body>
</html>
