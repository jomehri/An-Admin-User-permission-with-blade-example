<?php

namespace App\Services\Finance;

use App\Models\Basic\UserAccount;
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
     * @return array|null
     */
    public function getPendingPaymentRequests(): null|array
    {
        $result = [];

        if (!Auth::user()->can('moderate requests')) {
            return null;
        }

        PaymentRequest::query()->where(PaymentRequest::COLUMN_STATUS, PaymentRequest::STATUS_PENDING)
//            ->paginate(config("finance.records_per_page"))
            ->each(function (PaymentRequest $item) use (&$result) {
                $user = $item->user()->first();
                $userAccount = UserAccount::find($item->user_account_id);

                $result[] = [
                    'id' => $item->id,
                    'userName' => $user->name,
                    'userEmail' => $user->email,
                    'amount' => $item->amount,
                    'accountNumber' => $userAccount->account_number,
                ];
            });

        return $result;
    }

    /**
     * @param PaymentRequest $paymentRequest
     * @return void
     */
    public function approvePaymentRequest(PaymentRequest $paymentRequest): void
    {
        $paymentRequest->update([
            PaymentRequest::COLUMN_STATUS => PaymentRequest::STATUS_APPROVED
        ]);
    }

    /**
     * @param PaymentRequest $paymentRequest
     * @return void
     */
    public function rejectPaymentRequest(PaymentRequest $paymentRequest): void
    {
        $paymentRequest->update([
            PaymentRequest::COLUMN_STATUS => PaymentRequest::STATUS_REJECTED
        ]);
    }
}
