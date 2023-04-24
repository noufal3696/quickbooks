<?php

declare(strict_types=1);

namespace App\DataTransferObjects;

use App\Enums\Source;
use App\Http\Requests\TransactionsStoreRequest;
use Carbon\Carbon;

final class TransactionData extends AbstractBaseData
{
    public function __construct(
        public readonly string $transaction_id,
        public readonly string $token,
        public readonly string $transaction_type,
        public readonly bool $transaction_status,
        public readonly string $merchant_code,
        public readonly string $merchant_name,
        public readonly string $merchant_country,
        public readonly string $currency,
        public readonly float $amount,
        public readonly string $transaction_currency,
        public readonly float $transaction_amount,
        public readonly string $auth_code,
        public readonly Carbon $transaction_date
    ) {
    }

    public static function fromTransactionStoreRequest(TransactionsStoreRequest $request): self
    {
        $request = Source::resolveRequestClass($request);

        return new TransactionData(
            transaction_id: $request->getTransactionId(),
            token: $request->getToken(),
            transaction_type: $request->getTransactionType(),
            transaction_status: $request->getTransactionStatus(),
            merchant_code: $request->getMerchantCode(),
            merchant_name: $request->getMerchantName(),
            merchant_country: $request->getMerchantCountry(),
            currency: $request->getCurrency(),
            amount: $request->getAmount(),
            transaction_currency: $request->getTransactionCurrency(),
            transaction_amount: $request->getTransactionAmount(),
            auth_code: $request->getAuthCode(),
            transaction_date: $request->getTransactionDate()
        );
    }
}
