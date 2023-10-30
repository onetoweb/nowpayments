<?php

namespace NP\Endpoint;

/**
 * Min amount endpoint
 * 
 * @author Nikolai Shcherbin <support@wzm.me>
 * @copyright Nikolai Shcherbin
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
        return $this->request(parent::METHOD_GET, null, [], $query);
    }
}