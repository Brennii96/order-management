<?php
require_once 'core/init.php';
$client = new Clients();
$client->delete($_GET['id']);
Redirect::to('clients.php');
Session::flash('deleteSuccess', 'Client has successfully been deleted!');