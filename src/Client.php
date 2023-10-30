<?php

namespace NP;

use NP\Endpoint;

/**
 * Client.
 * 
 * @author Nikolai Shcherbin <support@wzm.me>
 * @copyright Nikolai Shcherbin
 */
class Client
{
    /**
     * API endpoint
     */
    const API_ENDPOINT = 'https://api.nowpayments.io';
    const API_SANDBOX_ENDPOINT = 'https://api-sandbox.nowpayments.io';
    
    /**
     * API version
     */
    const API_VERSION = 'v1';
    
    /**
     * @var string
     */
    private $apiKey;
    
    /**
     * @var bool
     */
    private $testModus;
	
	 /**
     * @var string
     */
    private $jwt;
    
    /**
     * @param string $apiKey
     * @param bool $testModus = false
	 * @param string $jwt = null
     */
    public function __construct(string $apiKey, bool $testModus = false, $jwt = null)
    {
        $this->apiKey = $apiKey;
        $this->testModus = $testModus;
		$this->jwt = $jwt;
        
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
     * @return string
     */
    public function getJwt()
    {
        return $this->jwt;
    }
    
    /**
     * Initialize endpoints.
     */
    private function initializeEndpoints()
    {
        $this->auth = new Endpoint\Auth($this);
		$this->status = new Endpoint\Status($this);
        $this->currency = new Endpoint\Currency($this);
        $this->payment = new Endpoint\Payment($this);
        $this->estimate = new Endpoint\Estimate($this);
        $this->invoice = new Endpoint\Invoice($this);
        $this->minAmount = new Endpoint\MinAmount($this);
		$this->subscriptions = new Endpoint\Subscriptions($this);
    }
}
