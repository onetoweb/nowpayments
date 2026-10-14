<?php

namespace Onetoweb\NOWPayments\Endpoint;

use Onetoweb\NOWPayments\Config\Method;

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
        return $this->request(Method::POST, null, $data);
    }
    
    /**
     * @param array $payment
     */
    public function get(int $paymentId): array
    {
        return $this->request(Method::GET, $paymentId);
    }
    
    
    /**
     * @param array $query
     */
    public function list(array $query): array
    {
        return $this->request(Method::GET, null, [], $query);
    }
}
