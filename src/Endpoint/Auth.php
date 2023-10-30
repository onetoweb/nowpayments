<?php

namespace NP\Endpoint;

/**
 * Authentication endpoint.
 * 
 * @author Nikolai Shcherbin <support@wzm.me>
 * @copyright Nikolai Shcherbin
 */
class Auth extends AbstractEndpoint
{
    const RESOURCE = 'auth';
    
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
    public function token(array $data): array
    {
        return $this->request(parent::METHOD_POST, null, $data);
    }
}