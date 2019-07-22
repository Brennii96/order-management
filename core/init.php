<?php
session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'brendan',
        'password' => '',
        'db' => 'order_management',
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'csrf',
    )
);

spl_autoload_register(function ($class) {
    return 'classes/' . $class . '.php';
});

require_once 'functions/sanitize.php';