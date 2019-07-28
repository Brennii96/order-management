<?php
require_once 'core/init.php';
$orders = new Orders();
$order = $orders->find(Input::get('id'));
$date = new DateTime($order->results()[0]->date_time);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Updating Order #<?php echo $order->results()[0]->orders_id; ?> | Order Management</title>
    <?php include_once 'icons.php'; ?>
</head>
<body>
<?php include_once 'header.php'; ?>
<div class="ui container six">
    <form method="post" class="form ui">
        <div class="ui field">
            <!-- This would be better as a dropdown -->
            <label for="order_status">Order Status</label>
            <input type="text" id="order_status" name="order_status" value="<?php echo $order->results()[0]->status; ?>">
        </div>
        <div class="ui field">
            <!-- This would be better as a dropdown -->
            <label for="payment_method">Payment Method</label>
            <input type="text" id="payment_method" name="payment_method" value="<?php echo $order->results()[0]->payment_method; ?>">
        </div>
        <div class="ui field">
            <label for="date_time">Date / Time</label>
            <input disabled type="datetime-local" id="date_time" name="date_time" value="<?php echo $date->format('Y-m-d\TH:i'); ?>">
        </div>
        <div class="ui field">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"><?php echo $order->results()[0]->description; ?></textarea>
        </div>
        <div class="ui field">
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            <input type="submit" value="Update" class="ui submit button right floated">
        </div>
    </form>
</div>
<?php include_once 'footer.php'; ?>
</body>
</html>