<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Actions\Database\StoreTransaction;
use App\DataTransferObjects\TransactionData;
use App\Http\Requests\TransactionsStoreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

final class TransactionsController
{
    public function index(): JsonResponse
    {
        $quickbooks = App::make('Spinen\QuickBooks\Client');

        return response()->json([
            'data' => $quickbooks->getDataService()->Query('SELECT * FROM Invoice')
        ]);
    }

    public function store(TransactionsStoreRequest $request): JsonResponse
    {
        if (StoreTransaction::execute(TransactionData::fromTransactionStoreRequest($request))) {
            return response()->json([
                'success' => true
            ], 201);
        } else {
            Log::error('Store transaction failed' . $request->getTransactionId());
            return response()->json([
                'success' => false,
                'message' => 'Saving transaction failed'
            ], 403);
        }
    }
}
