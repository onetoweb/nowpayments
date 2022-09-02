<?php

require 'vendor/autoload.php';

use Onetoweb\NOWPayments\Client as NOWPaymentsClient;

// params
$apiKey = 'api key';
$testMode = true;

// init NOWPayments client
$nowPaymentsClient = newPay($apiKey,$testMode);

// get status
$status = $nowPaymentsClient->status()->fetch();
// get currencies
$currencies = $nowPaymentsClient->currency()->fetch();

// estimate
$estimate = $nowPaymentsClient->estimate()->fetch([
    'amount' => 1,
    'currency_from' => 'eur',
    'currency_to' => 'doge'
]);

// create payment
$payment = $nowPaymentsClient->pay()->create([
    'price_amount' => 32,
    'price_currency' => 'eur',
    'pay_currency' => 'doge',
    'ipn_callback_url' => 'https://example.com/webhook.php',
    'order_id' => 'order 1',
    'order_description' => 'order_description'
]);

// get payment
$paymentId = 42;
$payment = $nowPaymentsClient->pay()->fetch($paymentId);

// list payments
$payments = $nowPaymentsClient->payment->list([
    'limit' => 10,
    'page' => 0,
    'sortBy' => 'created_at',
    'orderBy' => 'asc',
    'dateFrom' => '2020-01-01',
    'dateTo' => '2022-01-01'
]);

// get min amount
$minAmount = $nowPaymentsClient->amount()->fetch([
    'currency_from' => 'btc',
    'currency_to' => 'doge',
]);

// create invoice
$invoice = $nowPaymentsClient->invoice()->create([
    'price_amount' => 1000,
    'price_currency' => 'eur',
    'order_id' => 'order 1',
    'order_description' => 'order_description',
    'ipn_callback_url' => 'https://example.com/webhook.php',
    'success_url' => 'https://example.com/webhook.php',
    'cancel_url' => 'https://example.com/webhook.php'
]);
