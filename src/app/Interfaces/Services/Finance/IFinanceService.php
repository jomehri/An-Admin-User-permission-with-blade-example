<?php

namespace App\Interfaces\Services\Finance;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

interface IFinanceService
{
    /**
     */
    public function getUserAccounts(): Collection;

    /**
     * @param Request $request
     * @return void
     */
    public function savePaymentRequest(Request $request): void;
}
