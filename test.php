<?php
    error_reporting(E_ALL);

    require 'MagicHomeApi.php';

    $controller = new MagicHomeApi('192.168.1.31');


    // $controller->status();
    // exit;

    // get the HTTP method, path and body of the request
    $method = $_SERVER['REQUEST_METHOD'];
    $request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
    $input = json_decode(file_get_contents('php://input'),true);
     
    $actions = [
        'on'    => 'turnOn',
        'off'   => 'turnOff',
        'color' => 'updateColor'
    ];

    function g($arr, $var)
    {

    }

    function safeColor($index) {
        global $request;
        $num = 0;
        if (isset($request[$index])) {
            $num = (int) $request[$index];
        }
        if ($num < 0) {
            return 0;
        }
        if ($num > 255) {
            return 255;
        }
        return $num;
    }

    $action = '';
    if (isset($actions[$request[0]])) {
        $action = $actions[$request[0]];

        if ($action == 'updateColor') {

            $r = safeColor(1);
            $g = safeColor(2);
            $b = safeColor(3);
            $controller->{$action}($r, $g, $b);
        } else {
            $controller->{$action}();
        }

        
    }


    // $controller->turnOn();
    // //
    // $controller->updateColor(255, 0, 0);
    // //$controller->updateColor(0, 255, 0);
    //$controller->updateColor(0, 0, 255);
    //
    // [49, 0, 255, 0, 0, 0, 15, 63]

    die('..');