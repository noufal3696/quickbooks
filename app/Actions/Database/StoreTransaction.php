<?php

declare(strict_types=1);

namespace App\Actions\Database;

use App\DataTransferObjects\TransactionData;
use App\Models\Transaction;

final class StoreTransaction
{
    public static function execute(TransactionData $transactionData): bool
    {
        if (Transaction::where('transaction_id',  $transactionData->transaction_id)->exists()) {
            return false;
        }

        $transaction = new Transaction();
        $transaction->transaction_id = $transactionData->transaction_id;
        $transaction->token = $transactionData->token;
        $transaction->transaction_type = $transactionData->transaction_type;
        $transaction->transaction_status = $transactionData->transaction_status;
        $transaction->merchant_code = $transactionData->merchant_code;
        $transaction->merchant_name = $transactionData->merchant_name;
        $transaction->merchant_country = $transactionData->merchant_country;
        $transaction->currency = $transactionData->currency;
        $transaction->amount = $transactionData->amount;
        $transaction->transaction_amount = $transactionData->transaction_amount;
        $transaction->transaction_currency = $transactionData->transaction_currency;
        $transaction->auth_code = $transactionData->auth_code;
        $transaction->transaction_date = $transactionData->transaction_date;
        $transaction->save();

        return true;
    }
}