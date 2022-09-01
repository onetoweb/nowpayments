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
    public function info(array $query): array
    {
        return $this->setQuery($query)->get();
    }
}