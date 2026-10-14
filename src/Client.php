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
    public const API_ENDPOINT = 'https://api.nowpayments.io';
    public const API_SANDBOX_ENDPOINT = 'https://api.sandbox.nowpayments.io';
    
    /**
     * API version
     */
    public const API_VERSION = 'v1';
    
    /**
     * @param string $apiKey
     * @param bool $testModus = false
     */
    public function __construct(
        
        #[\SensitiveParameter]
        private string $apiKey,
        private bool $testModus = false
    ) {
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
     * @return string
     */
    public function getApiEndpoint(): string
    {
        if ($this->testModus) {
            return self::API_SANDBOX_ENDPOINT;
        }
        
        return self::API_ENDPOINT;
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
        $this->minAmount = new Endpoint\MinAmount($this);
    }
}
