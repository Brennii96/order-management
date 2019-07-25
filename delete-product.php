<?php
require_once 'core/init.php';
$product = new Products();
$product->delete($_GET['id']);
Redirect::to('products.php');
Session::flash('deleteSuccess', 'Product has successfully been deleted!');