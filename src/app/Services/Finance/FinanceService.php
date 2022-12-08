<?php

namespace App\Services\Finance;

use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Finance\PaymentRequest;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\Services\Finance\IFinanceService;

class FinanceService extends BaseService implements IFinanceService
{

    /**
     *
     */
    public function __construct()
    {
    }


    /**
     * @return Collection|null
     */
    public function getUserAccounts(): null|Collection
    {
        if (!Auth::user()->can('send requests')) {
            return null;
        }

        $user = Auth::user();

        return $user->accounts()->get();
    }

    /**
     * @param Request $request
     * @return void
     */
    public function savePaymentRequest(Request $request): void
    {
        PaymentRequest::create([
            PaymentRequest::COLUMN_USER_ID => Auth::id(),
            PaymentRequest::COLUMN_USER_ACCOUNT_ID => $request->post('account_id'),
            PaymentRequest::COLUMN_AMOUNT => $request->post('amount'),
            PaymentRequest::COLUMN_STATUS => PaymentRequest::STATUS_PENDING,
        ]);
    }

    /**
     * @return Collection|null
     */
    public function getPendingPaymentRequests(): null|Collection
    {
        if (!Auth::user()->can('moderate requests')) {
            return null;
        }

        return PaymentRequest::all()->where(PaymentRequest::COLUMN_STATUS, PaymentRequest::STATUS_PENDING);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function approvePaymentRequest(Request $request): void
    {
        // TODO: Implement approvePaymentRequest() method.
    }

    /**
     * @param Request $request
     * @return void
     */
    public function rejectPaymentRequest(Request $request): void
    {
        // TODO: Implement rejectPaymentRequest() method.
    }
}
