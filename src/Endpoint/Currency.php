<?php

namespace Onetoweb\NOWPayments\Endpoint;

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
    public function info(): array
    {
        return $this->get();
    }
}