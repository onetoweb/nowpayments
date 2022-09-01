<?php

namespace Onetoweb\NOWPayments\Endpoint;

/**
 * Min amount endpoint
 *
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 */
class MinAmount extends AbstractEndpoint
{
    const RESOURCE = 'min-amount';


    public function getResource(): string
    {
        return self::RESOURCE;
    }

    public function fetch(array $query): array
    {
        return $this->setQuery($query)->get();
    }
}