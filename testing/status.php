<?php

include 'index.php';


// testing Status Endpoint
$nowPayment = new \Onetoweb\NOWPayments\Client( $apiKey, $testMode);
$status = $nowPayment->status->get();

// response status:
// array(1) { ["message"]=> string(2) "OK" }
var_dump($status);