<?php
require_once 'core/init.php';
$clients = DB::getInstance()->query("SELECT * FROM clients;");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clients | Order Management</title>
    <?php include_once 'icons.php'; ?>
</head>
<body>
<?php include_once 'header.php'; ?>
<div class="ui container">
    <h1>Clients</h1>
    <?php
    if (Session::exists('deleteSuccess')) { ?>
        <div class="ui icon message">
            <i class="inbox icon"></i>
            <div class="content">
                <div class="header">
                    Successfully Delete Client
                </div>
                <p><?php echo Session::flash('deleteSuccess'); ?></p>
            </div>
        </div>
    <?php
    }
    ?>
    <table class="ui large table">
        <thead>
        <tr>
            <th>Client Name</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th class="center aligned">Actions</th>
        </tr>
        </thead>
        <tbody>
            <?php
            foreach ($clients->results() as $client) {
                echo "<tr>
                        <td>" . $client->client_name . "</td>
                        <td>" . $client->first_name . "</td>
                        <td>" . $client->last_name . "</td>
                        <td class='center aligned'>
                        <a class='hide' href='delete-client.php?id=".$client->clients_id."'>
                        <button class=\"ui icon negative button\">
                            <i class=\"trash icon\"></i>
                        </button></a>
                        <a href='view-client.php?id=".$client->clients_id."'>
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
            <th><?php echo $clients->count(); ?> Clients</th>
            <th></th>
            <th></th>
            <th class="center aligned">
                <a href="create-client.php">
                    <button class="ui button right-aligned">Create Client</button>
                </a>
            </th>
        </tr>
        </tfoot>
    </table>
</div>
<?php include_once 'footer.php'; ?>
</body>
</html>
