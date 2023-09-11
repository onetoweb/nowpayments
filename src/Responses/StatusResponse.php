<?php

namespace Onetoweb\NOWPayments\Responses;

class StatusResponse
{
    public function __construct(protected ?string $status)
    {
    }

    public function waiting(): bool
    {
        return $this->status == 'waiting';
    }

    public function partiallyPaid(): bool
    {
        return $this->status == 'partially_paid';
    }

    public function sending(): bool
    {
        return $this->status == 'sending';
    }

    public function confirming(): bool
    {
        return $this->status == 'confirming';
    }


    public function refunded(): bool
    {
        return $this->status == 'refunded';
    }


    public function confirmed(): bool
    {
        return $this->status == 'confirmed';
    }


    public function failed(): bool
    {
        return $this->status == 'failed';
    }


    public function finished(): bool
    {
        return $this->status == 'finished';
    }

    public function expired(): bool
    {
        return $this->status == 'expired';
    }

    public function paid()
    {
        return $this->partiallyPaid() || $this->finished();
    }

    public function __toString(): string
    {
        return $this->status;
    }
}
