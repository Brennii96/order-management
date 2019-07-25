<?php
require_once 'core/init.php';
$clients = new Clients();
if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate= new Validate();
        $validation = $validate->check($_POST, array(
            'first_name' => array(
                'name' => 'First Name',
                'required' => true,
                'min' => 2,
                'max' => 20,
            ),
            'client_name' => array(
                'name' => 'Client Name',
                'required' => true,
                'min' => 2,
                'max' => 20,
            ),
            'last_name' => array(
                'name' => 'Last Name',
                'required' => true,
                'last_name' => true,
                'min' => 2,
                'max' => 20,
            )
        ));
        if ($validation->passed()) {
            try {
                $clients->create(array(
                    'client_name' => Input::get('client_name'),
                    'first_name' => Input::get('first_name'),
                    'last_name' => Input::get('last_name'),
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }

            Session::flash('success', 'Client has successfully been created');
            Redirect::to('clients.php');
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
    <title>Orders | Order Management</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class="ui container">
<form method="post" class="form ui">
    <div class="ui field">
        <label for="client_name">Client Name</label>
        <input type="text" id="client_name" name="client_name">
    </div>
    <div class="ui field">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name">
    </div>
    <div class="ui field">
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name">
    </div>
    <div class="ui field">
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
        <input type="submit" value="Create">
    </div>
</form>
</div>
</body>
</html>