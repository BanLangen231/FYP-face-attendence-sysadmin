<?php

//const attribute show ths root name
define('APP_ROOT', __DIR__);

//const attribute show the error to see what problem
error_reporting(E_ALL);

ini_set('display_errors', true);


define('ADMIN_NAME', 'admin');

function dump($r)
{
    echo "<pre>";
    var_dump($r);
    echo "</pre>";
}
