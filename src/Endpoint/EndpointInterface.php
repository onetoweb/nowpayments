<?php

namespace Onetoweb\NOWPayments\Endpoint;

/**
 * Endpoint interface.
 * 
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 */
interface EndpointInterface
{
    /**
     * @return string
     */
    public function getResource(): string;
}