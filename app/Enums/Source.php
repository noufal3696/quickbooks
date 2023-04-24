<?php

declare(strict_types=1);

namespace App\Enums;

use App\Http\Requests\TransactionsStoreRequest;
use Illuminate\Support\Facades\App;

/**
 * Api source where transaction details are fetched
 */
enum Source:string {
    case QUICKBOOKS = 'quickbooks';
    case ZOHO = 'zoho';

    public static function resolveRequestClass(TransactionsStoreRequest $request): TransactionsStoreRequest
    {
        return match ((string) $request->route()->parameter('source')) {
            self::QUICKBOOKS->value => App::make('App\Http\Requests\QuickbooksTransactionStoreRequest'),
            self::ZOHO->value => App::make('App\Http\Requests\ZohoTransactionStoreRequest')
        };
    }
}
