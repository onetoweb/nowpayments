<?php

namespace Onetoweb\NOWPayments;

use Onetoweb\NOWPayments\Endpoint;

/**
 * Client.
 * 
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 */
class Client
{
    /**
     * API endpoint
     */
    const API_ENDPOINT = 'https://api.nowpayments.io';
    
    /**
     * API version
     */
    const API_VERSION = 'v1';
    
    /**
     * @var string
     */
    private $apiKey;
    
    /**
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        
        $this->initializeEndpoints();
    }
    
    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }
    
    /**
     * Initialize endpoints.
     */
    private function initializeEndpoints()
    {
        $this->status = new Endpoint\Status($this);
        $this->currency = new Endpoint\Currency($this);
        $this->payment = new Endpoint\Payment($this);
        $this->estimate = new Endpoint\Estimate($this);
        $this->invoice = new Endpoint\Invoice($this);
    }
}