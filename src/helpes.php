<?php
if (!function_exists('newPay')) {
    function newPay(string $apiKey = null): \Onetoweb\NOWPayments\Client
    {
        return new \Onetoweb\NOWPayments\Client($apiKey ?? getenv('NEW_PAY_API_KEY'));
    }
}