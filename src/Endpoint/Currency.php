<?php

namespace NP\Endpoint;

/**
 * Currency endpoint.
 * 
 * @author Nikolai Shcherbin <support@wzm.me>
 * @copyright Nikolai Shcherbin
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
        return $this->request(parent::METHOD_GET);
    }
}