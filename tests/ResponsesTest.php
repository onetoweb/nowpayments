<?php

use Onetoweb\NOWPayments\Responses\DataResponse;
use Onetoweb\NOWPayments\Responses\PaymentResponse;

test('Payment response test', function () {
    $data = [
        'amount_received' => 100.65445,
        'ipn_callback_url' => 'test:ipn_callback_url',
        'smart_contract' => 'test:smart_contract',
        'network' => 'test:network',
        'network_precision' => 'test:network_precision',
        'time_limit' => 45,
        'burning_percent' => 'test:burning_percent',
        'expiration_estimate_date' => 'test:expiration_estimate_date',
    ];
    $payment = PaymentResponse::collect($data);
    expect($payment->willReceive())->toBe($data['amount_received']);
    expect($payment->ipnCallbackUrl())->toBe($data['ipn_callback_url']);
    expect($payment->smartContract())->toBe($data['smart_contract']);
    expect($payment->network())->toBe($data['network']);
    expect($payment->timeLimit())->toBe($data['time_limit']);
    expect($payment->networkPrecision())->toBe($data['network_precision']);
    expect($payment->expireAt())->toBe($data['expiration_estimate_date']);
});

test('webhook data test', function () {
    $data = [
        'payment_id' => 6195736792,
        'invoice_id' => NULL,
        'payment_status' => 'waiting',
        'pay_address' => 'TJ5ietyhwqmjj3naoshTkg25xFw5vVRnkP',
        'price_amount' => 2,
        'price_currency' => 'trx',
        'pay_amount' => 2,
        'actually_paid' => 0,
        'actually_paid_at_fiat' => 0,
        'pay_currency' => 'trx',
        'order_id' => '4654654654',
        'order_description' => 'dec test',
        'purchase_id' => '6277445179',
        'created_at' => '2022-09-05T17:34:37.813Z',
        'updated_at' => '2022-09-05T17:36:42.230Z',
        'outcome_amount' => 1.790499,
        'outcome_currency' => 'trx',
    ];

    $payment = DataResponse::collect($data);
    expect($payment->id())->toEqual($data['payment_id']);
    expect($payment->invoiceID())->toEqual($data['invoice_id']);
    expect($payment->status())->toEqual($data['payment_status']);
    expect($payment->address())->toEqual($data['pay_address']);
    expect($payment->amount())->toEqual($data['price_amount']);
    expect($payment->currency())->toEqual($data['price_currency']);
    expect($payment->price())->toEqual($data['price_amount']);
    expect($payment->paid())->toEqual($data['actually_paid']);
    expect($payment->paidAtFiat())->toEqual($data['actually_paid_at_fiat']);
    expect($payment->currency())->toEqual($data['pay_currency']);
    expect($payment->orderID())->toEqual($data['order_id']);
    expect($payment->description())->toEqual($data['order_description']);
    expect($payment->purchaseID())->toEqual($data['purchase_id']);
    expect($payment->createdAt())->toEqual($data['created_at']);
    expect($payment->updatedAt())->toEqual($data['updated_at']);
    expect($payment->outcomeAmount())->toEqual($data['outcome_amount']);
    expect($payment->outcomeCurrency())->toEqual($data['outcome_currency']);
});
