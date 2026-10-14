<?php

namespace Onetoweb\NOWPayments\Endpoint;

use Onetoweb\NOWPayments\Config\Method;

/**
 * Min amount endpoint
 * 
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 */
class MinAmount extends AbstractEndpoint
{
    const RESOURCE = 'min-amount';
    
    /**
     * @return string
     */
    public function getResource(): string
    {
        return self::RESOURCE;
    }
    
    /**
     * @param array $query
     */
    public function get(array $query): array
    {
        return $this->request(Method::GET, null, [], $query);
    }
}