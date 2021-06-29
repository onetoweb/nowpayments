<?php

namespace Onetoweb\NOWPayments\Endpoint;

/**
 * Estimate endpoint
 * 
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 */
class Estimate extends AbstractEndpoint
{
    const RESOURCE = 'estimate';
    
    /**
     * @return string
     */
    public function getResource(): string
    {
        return self::RESOURCE;
    }
    
    /**
     * @param array $query
     * 
     * @return array
     */
    public function get(array $query): array
    {
        return $this->request(parent::METHOD_GET, null, [], $query);
    }
}