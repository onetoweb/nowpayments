<?php

use Onetoweb\NOWPayments\Client;

if (!function_exists('newPay')) {
    function newPay(?string $apiKey): Client
    {
        return new Client($apiKey ?? getenv('NEW_PAY_API_KEY'));
    }
}