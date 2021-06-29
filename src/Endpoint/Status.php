<?php

namespace Onetoweb\NOWPayments\Endpoint;

/**
 * Status endpoint.
 * 
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 */
class Status extends AbstractEndpoint
{
    const RESOURCE = 'status';
    
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
        return $this->request(parent::METHOD_GET);
    }
}