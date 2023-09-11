<?php

namespace Onetoweb\NOWPayments\Responses;

use Onetoweb\NOWPayments\Responses\Traits\HasPayment;

class DataResponse
{
    use HasPayment;

    protected ?string $invoiceID;

    protected ?string $outcomeCurrency;

    protected float|int|null $paid, $paidAtFiat, $outcomeAmount;

    public function __construct(protected array $data)
    {
        $this->setPaymentProperties();
        $this->invoiceID = $this->data['invoice_id'] ?? null;
        $this->outcomeCurrency = $this->data['outcome_currency'] ?? null;
        $this->paid = $this->data['actually_paid'] ?? null;
        $this->paidAtFiat = $this->data['actually_paid_at_fiat'] ?? null;
        $this->outcomeAmount = $this->data['outcome_amount'] ?? null;
    }

    public static function collect(array $data): DataResponse
    {
        return new self( $data);
    }

    public function invoiceID(): ?string
    {
        return $this->invoiceID;
    }

    public function outcomeCurrency(): ?string
    {
        return $this->outcomeCurrency;
    }

    public function paid(): int|float
    {
        return $this->paid;
    }

    public function paidAtFiat(): int|float
    {
        return $this->paidAtFiat;
    }

    public function outcomeAmount(): int|float
    {
        return $this->outcomeAmount;
    }
}
