<?php
require_once 'core/init.php';
$order = DB::getInstance()->query("SELECT * FROM orders JOIN products_to_order ON orders.orders_id = products_to_order.orders_id;");
?>

<h1>test</h1>
