<?php

use Onetoweb\NOWPayments\Client;

if (!function_exists('newPay')) {
    function newPay(string $apiKey = null,bool $testMode = false): Client
    {
        return new Client($apiKey ?? getenv('NEW_PAY_API_KEY'),$testMode);
    }
}
