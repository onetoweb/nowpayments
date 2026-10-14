<?php

namespace Onetoweb\NOWPayments\Endpoint;

use Onetoweb\NOWPayments\Config\Method;

/**
 * Currency endpoint.
 * 
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 */
class Currency extends AbstractEndpoint
{
    const RESOURCE = 'currencies';
    
    /**
     * @return string
     */
    public function getResource(): string
    {
        return self::RESOURCE;
    }
    
    /**
     * @return array
     */
    public function get(): array
    {
        return $this->request(Method::GET);
    }
}
