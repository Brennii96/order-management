<?php
require_once 'core/init.php';
$products = new Products();
if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate= new Validate();
        $validation = $validate->check($_POST, array(
            'product_name' => array(
                'name' => 'Product Name',
                'required' => true,
                'min' => 2,
                'max' => 20,
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
                $products->create(array(
                    'product_name' => Input::get('product_name'),
                    'description' => Input::get('description'),
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }

            Session::flash('success', 'Product has successfully been created');
            Redirect::to('products.php');
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
    <title>Create Products | Order Management</title>
</head>
<body>
<?php include_once 'header.php'; ?>
<div class="ui container">
<form method="post" class="form ui">
    <div class="ui field">
        <label for="product_name">Product Name</label>
        <input type="text" id="product_name" name="product_name">
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