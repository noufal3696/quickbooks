<?php

declare(strict_types=1);

namespace App\Interfaces;

use Illuminate\Support\Carbon;

interface TransactionsRequestInterface
{
    public function getTransactionId(): string;

    public function getToken(): string;

    public function getTransactionType(): string;

    public function getTransactionStatus(): bool;

    public function getMerchantCode(): string;

    public function getMerchantName(): string;

    public function getMerchantCountry(): string;

    public function getCurrency(): string;

    public function getAmount(): float;

    public function getTransactionCurrency(): string;

    public function getTransactionAmount(): float;

    public function getAuthCode(): string;

    public function getTransactionDate(): Carbon;
}
