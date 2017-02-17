<?php


$qs = '';
if (isset($_SERVER['QUERY_STRING'])) {
    $qs = $_SERVER['QUERY_STRING'];
}
echo "<pre>"; 


var_dump( $qs, $_SERVER ); exit;



