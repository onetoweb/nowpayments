<?php

namespace NP\Endpoint;

/**
 * Estimate endpoint
 * 
 * @author Nikolai Shcherbin <support@wzm.me>
 * @copyright Nikolai Shcherbin
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