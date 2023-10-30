<?php

namespace NP\Endpoint;

/**
 * Invoice endpoint
 * 
 * @author Nikolai Shcherbin <support@wzm.me>
 * @copyright Nikolai Shcherbin
 */
class Invoice extends AbstractEndpoint
{
    const RESOURCE = 'invoice';
    
    /**
     * @return string
     */
    public function getResource(): string
    {
        return self::RESOURCE;
    }
    
    /**
     * @param array $data
     * 
     * @return array
     */
    public function create(array $data): array
    {
        return $this->request(parent::METHOD_POST, null, $data);
    }
}