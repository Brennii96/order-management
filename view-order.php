<?php
require_once 'core/init.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clients | Order Management</title>
    <?php include_once 'icons.php'; ?>
</head>
<body>
<?php include_once 'header.php'; ?>
<div class="ui container">
    <h2><?php echo DB::getInstance()->query("SELECT client_name FROM clients WHERE clients_id = " . Input::get('id') ."")->results()[0]->client_name; ?>'s Orders</h2>
    <?php if (DB::getInstance()->query("SELECT * FROM orders JOIN products_to_order ON orders.orders_id = products_to_order.orders_id;")->results()[0]->clients_id == Input::get('id')) { ?>
        <h3>No orders have been placed.</h3>
    <?php } else { ?>
    <table class="ui large table">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Payment Method</th>
            <th>Status</th>
            <th>Product ID</th>
            <th>Price</th>
            <th>Postage</th>
            <th>Despatch Date</th>
            <th>Order Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach (DB::getInstance()->query("SELECT * FROM orders JOIN products_to_order ON orders.orders_id = products_to_order.orders_id;")->results() as $order) {
            $despatchDate = new DateTime($order->despatch_date);
            $dateTime = new DateTime($order->date_time);
            echo "<tr>
                        <td>" . $order->orders_id . "</td>
                        <td>" . $order->payment_method . "</td>
                        <td>" . $order->status . "</td>
                        <td>" . DB::getInstance()->get('products', array('products_id', '=', $order->products_id))->results()[0]->product_name . "</td>
                        <td>" . $order->price . "</td>
                        <td>" . $order->postage . "</td>
                        <td>" . $despatchDate->format('d F Y, h:i A')  . "</td>
                        <td>" . $dateTime->format('d F Y, h:i A') . "</td>
                        <td>
                        <a href='delete-client.php?id=".$order->clients_id."'>
                            <button class=\"ui icon negative button\">
                                <i class=\"trash icon\"></i>
                            </button>
                        </a>
                        <a href='view-client.php?id=".$order->clients_id."'>
                            <button class=\"ui icon button\">
                                <i class=\"eye icon\"></i>
                            </button>
                        </a>
                        </td>
                      </tr>";
        } ?>
        </tbody>
        <tfoot>
        <tr>
<!--            <th>--><?php //echo $->count(); ?><!-- Clients</th>-->
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>
                <a href="create-client.php">
                    <button class="ui button right-aligned">Create Client</button>
                </a>
            </th>
        </tr>
        </tfoot>
    </table>
    <?php } ?>
</div>
</body>
</html>