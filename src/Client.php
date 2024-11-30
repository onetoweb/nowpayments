<?php
 /**
  * This repository is forked from original repository by Onetoweb B.V.
  * @see https://github.com/onetoweb/nowpayments
  *
  * Add some error fix 
    FIX for support PHP 8.2 

    Deprecated: Creation of dynamic property Onetoweb\NOWPayments\Client::$status is deprecated
    Deprecated: Creation of dynamic property Onetoweb\NOWPayments\Client::$currency is deprecated
    Deprecated: Creation of dynamic property Onetoweb\NOWPayments\Client::$payment is deprecated
    Deprecated: Creation of dynamic property Onetoweb\NOWPayments\Client::$estimate is deprecated 
    Deprecated: Creation of dynamic property Onetoweb\NOWPayments\Client::$invoice is deprecated
    Deprecated: Creation of dynamic property Onetoweb\NOWPayments\Client::$minAmount is deprecated
  * @see https://github.com/ay4t/nowpayments
  */

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
    const API_ENDPOINT          = 'https://api.nowpayments.io';
    const API_SANDBOX_ENDPOINT  = 'https://api-sandbox.nowpayments.io';
    
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
     * @var Endpoint\Status
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public $status;

    /**
     * @var Endpoint\Currency
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public $currency;

    /**
     * @var Endpoint\Payment
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public $payment;
    
    /**
     * @var Endpoint\Estimate
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public $estimate;

    /**
     * @var Endpoint\Invoice
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public $invoice;

    /**
     * @var Endpoint\MinAmount
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public $minAmount;


    /**
     * @param string $apiKey
     * @param bool $testModus = false
     */
    public function __construct(string $apiKey, bool $testModus = false)
    {
        $this->apiKey = $apiKey;
        $this->testModus = $testModus;
        
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
        $this->status       = new Endpoint\Status($this);
        $this->currency     = new Endpoint\Currency($this);
        $this->payment      = new Endpoint\Payment($this);
        $this->estimate     = new Endpoint\Estimate($this);
        $this->invoice      = new Endpoint\Invoice($this);
        $this->minAmount    = new Endpoint\MinAmount($this);
    }
}