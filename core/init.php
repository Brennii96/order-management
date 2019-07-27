<?php
session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'db' => 'order_management',
        'user' => 'brendan',
        'password' => '',
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'csrf',
    ),
    'cache' => array(
        'location' => 'cache',
        'expiry' => 3600
    )
);

spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});