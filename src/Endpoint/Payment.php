<?php

namespace Onetoweb\NOWPayments\Endpoint;

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
     * @return array
     */
    public function create(array $data): array
    {
        return $this->setData($data)->post();
    }

    /**
     * @param int $paymentId
     * @return array
     */
    public function info(int $paymentId): array
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