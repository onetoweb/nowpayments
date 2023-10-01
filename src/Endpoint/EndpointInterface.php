<?php

namespace NP\Endpoint;

/**
 * Endpoint interface.
 * 
 * @author Nikolai Shcherbin <support@wzm.me>
 * @copyright Nikolai Shcherbin
 */
interface EndpointInterface
{
    /**
     * @return string
     */
    public function getResource(): string;
}