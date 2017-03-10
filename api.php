<?php
    error_reporting(E_ALL);

    require 'MagicHomeApi.php';

    $controller = new MagicHomeApi('192.168.1.31');


    // $controller->status();
    // exit;

    // get the HTTP method, path and body of the request
    $method = $_SERVER['REQUEST_METHOD'];
    $qs = '';
    if (isset($_SERVER['QUERY_STRING'])) {
        $qs = $_SERVER['QUERY_STRING'];
    }
    
    $request = explode('/', trim($qs,'/'));
    $input = json_decode(file_get_contents('php://input'),true);

    $actions = [
        'on'    => 'turnOn',
        'off'   => 'turnOff',
        'toggle'=> 'toggle',
        'color' => 'updateColor',
        'status'=> 'status'
    ];

    function g($arr, $var)
    {

    }

    function safeColor($index) 
    {
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

    function setColor()
    {

    }

    $action = '';
    if (isset($actions[$request[0]])) {
        $action = $actions[$request[0]];
        
        switch ($action) {
            case 'updateColor':
                $r = safeColor(1);
                $g = safeColor(2);
                $b = safeColor(3);
                $resp = $controller->{$action}($r, $g, $b);
                $color = [$r, $g, $b];
                break;
            case 'status':
                $resp = $controller->status();
                $color = $controller->getColor();
                break;
            default:
                $resp = $controller->{$action}();
                //$resp = $controller->status();
                $color = $controller->getColor();
                break;
        }
    }

    $power = $controller->isOn();
    

    $data = [
        'power' => $power,
        'status'=> (bool) $resp, 
        'color' => $color
    ];

    header('Content-Type: application/json');
    die(json_encode($data));    