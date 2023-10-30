<?php

namespace NP\Endpoint;

/**
 * Subscriptions endpoint
 * 
 * @author Nikolai Shcherbin <support@wzm.me>
 * @copyright https://wzm.me
 */
class Subscriptions extends AbstractEndpoint
{
    const RESOURCE = 'subscriptions';
    
    /**
     * @return string
     */
    public function getResource(): string
    {
        return self::RESOURCE;
    }
    
    /**
     * @param array $data
     */
    public function createPlan(array $data): array
    {
        return $this->request(parent::METHOD_POST, 'plans', $data);
    }
	
	/**
     * @param int $planId
	 * @param array $data
     */
    public function updatePlan(int $planId, array $data): array
    {
        return $this->request(parent::METHOD_PATCH, 'plans/' . $planId, $data);
    }
    
    /**
     * @param int $planId
     */
    public function getPlan(int $planId): array
    {
        return $this->request(parent::METHOD_GET, 'plans/' . $planId);
    }
	
    /**
     * @param array $data
     */
    public function getManyPlans(array $data): array
    {
        return $this->request(parent::METHOD_GET, 'plans', $data);
    }
    
    /**
     * @param array $data
     */
    public function createSubscription(array $data): array
    {
        return $this->request(parent::METHOD_POST, null, $data);
    }
	
	/**
     * @param int $subId
     */
    public function getSubscription(int $subId): array
    {
        return $this->request(parent::METHOD_GET, $subId);
    }
	
	/**
     * @param array $data
     */
    public function getManySubscriptions(array $data): array
    {
        return $this->request(parent::METHOD_GET, null, $data);
    }
	
	/**
     * @param int $subId
     */
    public function deleteSubscription(int $subId): array
    {
        return $this->request(parent::METHOD_DELETE, $subId);
    }
}