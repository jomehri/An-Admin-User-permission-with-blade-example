<?php

namespace App\Interfaces\Services\Finance;

use Illuminate\Http\Request;
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
     * @return Collection|null
     */
    public function getPendingPaymentRequests(): null|Collection;

    /**
     * @param Request $request
     * @return void
     */
    public function approvePaymentRequest(Request $request): void;

    /**
     * @param Request $request
     * @return void
     */
    public function rejectPaymentRequest(Request $request): void;
}
