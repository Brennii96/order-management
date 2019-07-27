<?php
require_once 'core/init.php';
$productsToOrder = new ProductsToOrder();
$orders = new Orders();
$date = new DateTime();
if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate= new Validate();
        $validation = $validate->check($_POST, array(
            'client' => array(
                'name' => 'Client',
                'required' => true,
            ),
            'products' => array(
                'name' => 'Product',
                'required' => true,
            ),
            'price' => array(
                'name' => 'Price',
                'required' => true,
            ),
            'postage' => array(
                'name' => 'Postage',
                'required' => true,
            ),
            'despatch_date' => array(
                'name' => 'Despatch Date',
                'required' => true,
            ),
            'status' => array(
                'name' => 'Order Status',
                'required' => true,
            ),
            'payment_method' => array(
                'name' => 'Payment method',
                'required' => true,
            ),
            'order_description' => array(
                'name' => 'Description',
                'required' => true,
            )
        ));
        if ($validation->passed()) {
            try {
                $productsToOrder->create(array(
                    'orders_id' => Input::get('orders_id'),
                    'clients_id' => Input::get('client'),
                    'orders_id' => 2,
                    'products_id' => Input::get('products'),
                    'price' => Input::get('price'),
                    'postage' => Input::get('postage'),
                    'despatch_date' => Input::get('despatch_date'),
                ));

            } catch (Exception $e) {
                die($e->getMessage());
            }

            Session::flash('success', 'Order has successfully been created');
            Redirect::to('index.php');
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
    <?php include_once 'icons.php'; ?>
    <title>Create Order | Order Management</title>
</head>
<body>
<?php include_once 'header.php'; ?>
<div class="ui container">
    <form method="post" class="form ui">
        <div class="ui field">
            <label for="orders_id">Order ID</label>
            <select name="orders_id" id="orders_id" class="ui dropdown fluid search" multiple="">
                <option value="">Select Order ID</option>
                <?php foreach (DB::getInstance()->query('SELECT * FROM orders;')->results() as $order) {
                    echo "<option value='".$order->orders_id ."'>" . $orders->status . "</option>";
                } ?>
            </select>
        </div>
        <div class="ui field">
            <label for="products">Products</label>
            <select name="products" id="products" class="ui dropdown fluid search" multiple="">
                <option value="">Select Product/s</option>
                <?php foreach (DB::getInstance()->query('SELECT * FROM products;')->results() as $product) {
                    echo "<option value='".$product->products_id ."'>".$product->product_name."</option>";
                } ?>
            </select>
        </div>
        <div class="ui field">
            <label for="client">Client</label>
            <select name="client" id="client" class="label ui selection fluid dropdown">
                <option value="">Select Client</option>
                <?php foreach (DB::getInstance()->query('SELECT * FROM clients;')->results() as $client) {
                    echo "<option value='".$client->clients_id."'>".$client->client_name."</option>";
                } ?>
            </select>
        </div>
        <div class="ui field">
            <label for="order_description">Description</label>
            <textarea name="order_description" id="order_description" cols="30" rows="10"></textarea>
        </div>
        <div class="ui field">
            <label for="payment_method">Payment Method</label>
            <input type="text" id="payment_method" name="payment_method">
        </div>
        <div class="ui field">
            <label for="status">Status</label>
            <input type="text" id="status" name="status">
        </div>
        <div class="ui field">
            <label for="price">Price</label>
            <input type="number" step="0.01" min="0" id="price" name="price">
        </div>
        <div class="ui field">
            <label for="postage">Postage</label>
            <input type="number" step="0.01" min="0" id="postage" name="postage" >
        </div>
        <div class="ui field">
            <label for="despatch_date">Despatch Date</label>
            <input type="datetime-local" id="despatch_date" name="despatch_date">
        </div>
        <div class="ui field">
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            <input type="submit" value="Create">
        </div>
    </form>
</div>

<?php include_once 'footer.php'; ?>
<script>
    $('#client').dropdown();
    $('#orders_id').dropdown();
    $('#products').dropdown();
</script>
</body>
</html>