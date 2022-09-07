<?php

namespace Onetoweb\NOWPayments\Responses\Traits;

use Onetoweb\NOWPayments\Responses\StatusResponse;

trait HasPayment
{
    protected ?string $id;

    protected StatusResponse $status;

    protected ?string $address;

    protected ?string $currency;

    protected ?string $description;

    protected ?string $createdAt;

    protected ?string $updatedAt;

    protected ?string $purchaseID;

    protected ?string $orderID;

    protected float|int|null $amount,$price;

    public function setPaymentProperties(): void
    {
        $this->id = $this->data['payment_id'] ?? null;
        $this->status = new StatusResponse( $this->data['payment_status'] ?? null);
        $this->address = $this->data['pay_address'] ?? null;
        $this->currency = $this->data['price_currency'] ?? null;
        $this->price = $this->data['price_amount'] ?? null;
        $this->description = $this->data['order_description'] ?? null;
        $this->createdAt = $this->data['created_at'] ?? null;
        $this->updatedAt = $this->data['updated_at'] ?? null;
        $this->purchaseID = $this->data['purchase_id'] ?? null;
        $this->orderID = $this->data['order_id'] ?? null;
        $this->invoiceID = $this->data['invoice_id'] ?? null;
        $this->amount = $this->data['pay_amount'] ?? null;
    }

    public function status(): ?StatusResponse
    {
        return $this->status;
    }

    public function address(): ?string
    {
        return $this->address;
    }

    public function currency(): ?string
    {
        return $this->currency;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function createdAt(): ?string
    {
        return $this->createdAt;
    }

    public function updatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function purchaseID(): ?string
    {
        return $this->purchaseID;
    }

    public function orderID(): ?string
    {
        return $this->orderID;
    }

    public function id(): ?string
    {
        return $this->id;
    }

    public function amount(): int|float|null
    {
        return $this->amount;
    }

    public function price(): int|float|null
    {
        return $this->price;
    }
}
