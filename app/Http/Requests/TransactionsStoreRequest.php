<?php

namespace App\Http\Requests;

use App\Interfaces\TransactionsRequestInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;


class TransactionsStoreRequest extends FormRequest implements TransactionsRequestInterface
{
    public function rules(): array
    {
        return [
            'transaction_id' => ['required', 'numeric'],
            'token' => ['required', 'numeric'],
            'transaction_type' => ['required', 'string', 'in:D,C'],
            'transaction_status' => ['required', 'in:0,1'],
            'merchant_code' => ['required', 'numeric'],
            'merchant_name' => ['required', 'string'],
            'merchant_country' => ['required', 'string', 'min:1', 'max:3'],
            'currency' => ['required', 'string', 'min:1', 'max:3'],
            'amount' => ['required', 'numeric'],
            'transaction_currency' => ['required', 'string', 'min:1', 'max:3'],
            'transaction_amount' => ['required', 'numeric'],
            'auth_code' => ['required'],
            'transaction_date' => ['required']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException(
            $validator,
            new JsonResponse(['success' => false, 'errors' => $validator->errors()])
        );
    }

    public function getTransactionId(): string
    {
        return $this->input('transaction_id');
    }

    public function getToken(): string
    {
        return $this->input('token');
    }

    public function getTransactionType(): string
    {
        return $this->input('transaction_type');
    }

    public function getTransactionStatus(): bool
    {
        return $this->input('transaction_status');
    }

    public function getMerchantCode(): string
    {
        return $this->input('merchant_code');
    }

    public function getMerchantName(): string
    {
        return $this->input('merchant_name');
    }

    public function getMerchantCountry(): string
    {
        return $this->input('merchant_country');
    }

    public function getCurrency(): string
    {
        return $this->input('currency');
    }

    public function getAmount(): float
    {
        return $this->input('amount');
    }

    public function getTransactionCurrency(): string
    {
        return $this->input('transaction_currency');
    }

    public function getTransactionAmount(): float
    {
        return $this->input('transaction_amount');
    }

    public function getAuthCode(): string
    {
        return $this->input('auth_code');
    }

    public function getTransactionDate(): Carbon
    {
        return Carbon::parse($this->input('transaction_date'));
    }
}
