
<?php

use App\Enums\Source;
use App\Http\Controllers\Api\TransactionsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')
    ->controller(TransactionsController::class)
    ->name('transactions.')
    ->group(function () {
        // api to list all transactions
        Route::get('/transactions', 'index')->name('index');

        // api for storing transactions sent by external 3rd parties
        Route::post('/transactions/{source}/sync', 'store')
            ->whereIn('source', collect(Source::cases())->pluck('value')->toArray())
            ->name('store');
    });
