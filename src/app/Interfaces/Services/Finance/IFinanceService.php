<?php

namespace App\Interfaces\Services\Finance;

use Illuminate\Http\Request;
use App\Models\Finance\PaymentRequest;
use Illuminate\Database\Eloquent\Collection;

interface IFinanceService
{
    /**
     * @return Collection|null
     */
    public function getUserAccounts(): null|Collection;

    /**
     * @param Request $request
     * @return void
     */
    public function savePaymentRequest(Request $request): void;

    /**
     * @return array|null
     */
    public function getPendingPaymentRequests(): null|array;

    /**
     * @param PaymentRequest $paymentRequest
     * @return void
     */
    public function approvePaymentRequest(PaymentRequest $paymentRequest): void;

    /**
     * @param PaymentRequest $paymentRequest
     * @return void
     */
    public function rejectPaymentRequest(PaymentRequest $paymentRequest): void;
}
