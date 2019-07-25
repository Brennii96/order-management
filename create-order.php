<?php
require_once 'core/init.php';
$orders = new Orders();
if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate= new Validate();
        $validation = $validate->check($_POST, array(
            'order_status' => array(
                'name' => 'Order Status',
                'required' => true,
                'min' => 2,
                'max' => 50,
            ),
            'payment_method' => array(
                'name' => 'Payment Method',
                'required' => true,
                'min' => 2,
                'max' => 50,
            ),
            'date_time' => array(
                'name' => 'Date / Time',
                'required' => true,
                'min' => 2,
                'max' => 50,
            ),
            'description' => array(
                'name' => 'Description',
                'required' => true,
                'min' => 2,
                'max' => 250,
            )
        ));
        if ($validation->passed()) {
            try {
                $orders->create(array(
                    'status' => Input::get('order_status'),
                    'payment_method' => Input::get('payment_method'),
                    'date_time' => Input::get('date_time'),
                    'description' => Input::get('description'),
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }

            Session::flash('success', 'Order has successfully been created');
            Redirect::to('orders.php');
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'icons.php'; ?>
    <title>Create Order | Order Management</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class="ui container">
<form method="post" class="form ui">
    <div class="ui field">
        <label for="order_status">Order Status</label>
        <input type="text" id="order_status" name="order_status">
    </div>
    <div class="ui field">
        <label for="payment_method">Payment Method</label>
        <input type="text" id="payment_method" name="payment_method">
    </div>
    <div class="ui field">
        <label for="date_time">Date / Time</label>
        <input type="datetime-local" id="date_time" name="date_time">
    </div>
    <div class="ui field">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
    </div>
    <div class="ui field">
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
        <input type="submit" value="Create">
    </div>
</form>
</div>
</body>
</html>