<?php
    error_reporting(E_ALL);

    require 'MagicHomeApi.php';
    require 'BulbScanner.php';

    $scanner = new BulbScanner('192.168.1.100', '192.168.1.255');
    $bulbs = $scanner->scan();

    echo "<pre>".__FILE__.'<br>'.__METHOD__.' : '.__LINE__."<br><br>"; var_dump( $bulbs ); exit;
    


    // $scan = MagicHomeApi::scan();
    // echo "<pre>".__FILE__.'<br>'.__METHOD__.' : '.__LINE__."<br><br>"; var_dump( $scan ); exit;


    // $controller = new MagicHomeApi('192.168.1.31');
    // //
    // //
    // //
    // $controller->debug();

    // // $color = $controller->updateColor(255, 0, 0);
    // // // // // //$controller->updateColor(0, 255, 0);
    // $controller->updateColor(0, 0, 255);

    // // echo "<pre>".__FILE__.'<br>'.__METHOD__.' : '.__LINE__."<br><br>"; var_dump( $color ); exit;
    
    
    // //
    // // [49, 0, 255, 0, 0, 0, 15, 63]

    // $status = $controller->status();

    // echo "<pre>".__FILE__.'<br>'.__METHOD__.' : '.__LINE__."<br><br>"; var_dump( $status ); exit;
    

    die('..');