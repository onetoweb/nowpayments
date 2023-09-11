<?php

use Onetoweb\NOWPayments\Responses\DataResponse;
use Onetoweb\NOWPayments\Responses\PaymentResponse;
use Onetoweb\NOWPayments\Responses\StatusResponse;

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

    $response = DataResponse::collect($data);
    expect($response->id())->toEqual($data['payment_id']);
    expect($response->invoiceID())->toEqual($data['invoice_id']);
    expect($response->status())->toEqual($data['payment_status']);
    expect($response->address())->toEqual($data['pay_address']);
    expect($response->amount())->toEqual($data['price_amount']);
    expect($response->currency())->toEqual($data['price_currency']);
    expect($response->price())->toEqual($data['price_amount']);
    expect($response->paid())->toEqual($data['actually_paid']);
    expect($response->paidAtFiat())->toEqual($data['actually_paid_at_fiat']);
    expect($response->currency())->toEqual($data['pay_currency']);
    expect($response->orderID())->toEqual($data['order_id']);
    expect($response->description())->toEqual($data['order_description']);
    expect($response->purchaseID())->toEqual($data['purchase_id']);
    expect($response->createdAt())->toEqual($data['created_at']);
    expect($response->updatedAt())->toEqual($data['updated_at']);
    expect($response->outcomeAmount())->toEqual($data['outcome_amount']);
    expect($response->outcomeCurrency())->toEqual($data['outcome_currency']);
});

test('status methods', function () {

    expect( status('finished')->paid())->toBeTrue();
    expect( status('partially_paid')->paid())->toBeTrue();
    expect( status('sending')->paid())->toBeFalse();
    expect( status('sending')->sending())->toBeTrue();
    expect( status('waiting')->waiting())->toBeTrue();
    expect( status('confirmed')->confirmed())->toBeTrue();
    expect( status('confirming')->confirming())->toBeTrue();
});
