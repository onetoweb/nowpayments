<?php

namespace Onetoweb\NOWPayments\Responses;

use Onetoweb\NOWPayments\Responses\Traits\HasPayment;

class PaymentResponse
{
    use HasPayment;

    protected ?string $ipnCallbackUrl;
    protected ?string $smartContract;
    protected ?string $network;
    protected ?string $networkPrecision;
    protected ?string $burningPercent;
    protected ?string $expireAt;

    protected float|int|null $willReceive, $timeLimit;

    public function __construct(protected array $data)
    {
        $this->setPaymentProperties();
        $this->willReceive = $this->data['amount_received'] ?? null;
        $this->ipnCallbackUrl = $this->data['ipn_callback_url'] ?? null;
        $this->smartContract = $this->data['smart_contract'] ?? null;
        $this->network = $this->data['network'] ?? null;
        $this->networkPrecision = $this->data['network_precision'] ?? null;
        $this->timeLimit = $this->data['time_limit'] ?? null;
        $this->burningPercent = $this->data['burning_percent'] ?? null;
        $this->expireAt = $this->data['expiration_estimate_date'] ?? null;
    }

    public static function collect(array $data): PaymentResponse
    {
        return new self($data);
    }

    public function willReceive(): int|float|null
    {
        return $this->willReceive;
    }

    public function ipnCallbackUrl(): ?string
    {
        return $this->ipnCallbackUrl;
    }

    public function smartContract(): ?string
    {
        return $this->smartContract;
    }

    public function network(): ?string
    {
        return $this->network;
    }

    public function networkPrecision(): ?string
    {
        return $this->networkPrecision;
    }

    public function timeLimit(): int|float|null
    {
        return $this->timeLimit;
    }

    public function burningPercent(): ?string
    {
        return $this->burningPercent;
    }

    public function expireAt(): ?string
    {
        return $this->expireAt;
    }

}
