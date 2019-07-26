<?php
require_once 'core/init.php';
$clients = new Clients();
//$orders = new Orders();

$client = $clients->find(Input::get('id'))->results();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'icons.php'; ?>
    <title><?php echo $client[0]->client_name; ?> | Order Management</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class="ui container">
    <table class="ui large table">
        <thead>
        <tr>
            <th>Client Name</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $client[0]->client_name; ?></td>
            <td><?php echo $client[0]->first_name; ?></td>
            <td><?php echo $client[0]->last_name; ?></td>
            <td>

            </td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <th>Orders</th>
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