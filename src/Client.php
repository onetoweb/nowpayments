<?php

namespace Onetoweb\NOWPayments;

use Onetoweb\NOWPayments\Endpoint;
use Onetoweb\NOWPayments\Endpoint\Currency;
use Onetoweb\NOWPayments\Endpoint\Estimate;
use Onetoweb\NOWPayments\Endpoint\Invoice;
use Onetoweb\NOWPayments\Endpoint\MinAmount;
use Onetoweb\NOWPayments\Endpoint\Payment;
use Onetoweb\NOWPayments\Endpoint\Status;

/**
 * Client.
 *
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 */
class Client
{
    /**
     * API endpoint
     */
    const API_ENDPOINT = 'https://api.nowpayments.io';
    const API_SANDBOX_ENDPOINT = 'https://api-sandbox.nowpayments.io';
    const API_VERSION = 'v1';

    public function __construct(protected string $apiKey, protected bool $testMode = false)
    {

    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getApiEndpoint(): string
    {
        if ($this->testMode) {
            return self::API_SANDBOX_ENDPOINT;
        }

        return self::API_ENDPOINT;
    }

    public function status(): Status
    {
        return new Status($this);
    }

    public function amount(): MinAmount
    {
        return new MinAmount($this);
    }

    public function currency(): Currency
    {
        return new Currency($this);
    }

    public function estimate(): Estimate
    {
        return new Estimate($this);
    }

    public function invoice(): Invoice
    {
        return new Invoice($this);
    }

    public function pay(): Payment
    {
        return new Payment($this);
    }

}
