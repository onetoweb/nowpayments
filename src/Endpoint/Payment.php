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
     */
    public function create(array $data): array
    {
        return $this->request(parent::METHOD_POST, null, $data);
    }
    
    /**
     * @param array $payment
     */
    public function get(int $paymentId): array
    {
        return $this->request(parent::METHOD_GET, $paymentId);
    }
    
    
    /**
     * @param array $query
     */
    public function list(array $query): array
    {
        return $this->request(parent::METHOD_GET, null, [], $query);
    }
}