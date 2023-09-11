<?php

namespace Onetoweb\NOWPayments\Endpoint;

use Onetoweb\NOWPayments\Responses\PaymentResponse;

/**
 * Payment endpoint
 *
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 */
class Payment extends AbstractEndpoint
{
    const RESOURCE = 'payment';

    /**
     * @return string
     */
    public function getResource(): string
    {
        return self::RESOURCE;
    }

    /**
     * @param array $data
     * @return PaymentResponse
     */
    public function create(array $data): PaymentResponse
    {
        return PaymentResponse::collect($this->setData($data)->post());
    }

    /**
     * @param int $paymentId
     * @return array
     */
    public function fetch(int $paymentId): array
    {
        return $this->setEndpoint( $paymentId)->get();
    }


    /**
     * @param array $query
     * @return array
     */
    public function list(array $query): array
    {
        return $this->setQuery($query)->get();
    }
}