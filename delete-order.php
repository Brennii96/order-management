<?php
require_once 'core/init.php';
$order = new Orders();
$order->delete($_GET['id']);
Redirect::to('orders.php');
Session::flash('deleteSuccess', 'Order has successfully been deleted!');