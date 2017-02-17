<?php
    error_reporting(E_ALL);

    require 'MagicHomeApi.php';

    $controller = new MagicHomeApi('192.168.1.31');
    $controller->debug();

    //$controller->updateColor(255, 0, 0);
    // //$controller->updateColor(0, 255, 0);
    //$controller->updateColor(0, 0, 255);
    //
    // [49, 0, 255, 0, 0, 0, 15, 63]

    $controller->status();

    print_r($controller->color);

    die('..');