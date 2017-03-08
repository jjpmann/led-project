<?php
    error_reporting(E_ALL);

    require 'MagicHomeApi.php';


    // $scan = MagicHomeApi::scan();
    // echo "<pre>".__FILE__.'<br>'.__METHOD__.' : '.__LINE__."<br><br>"; var_dump( $scan ); exit;


    $controller = new MagicHomeApi('192.168.1.31');
    //
    //
    //
    $controller->debug();

    // $color = $controller->updateColor(255, 0, 0);
    // // // // //$controller->updateColor(0, 255, 0);
    $controller->updateColor(0, 0, 255);

    // echo "<pre>".__FILE__.'<br>'.__METHOD__.' : '.__LINE__."<br><br>"; var_dump( $color ); exit;
    
    
    //
    // [49, 0, 255, 0, 0, 0, 15, 63]

    $status = $controller->status();

    echo "<pre>".__FILE__.'<br>'.__METHOD__.' : '.__LINE__."<br><br>"; var_dump( $status ); exit;
    

    die('..');