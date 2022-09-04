<?php

use Onetoweb\NOWPayments\Client;

if (!function_exists('nowPay')) {
    function nowPay(string $apiKey = null,bool $testMode = false): Client
    {
        return new Client($apiKey ?? getenv('NOW_PAY_API_KEY'),$testMode);
    }
}
