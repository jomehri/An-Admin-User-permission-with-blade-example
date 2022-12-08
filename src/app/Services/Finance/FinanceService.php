<?php

namespace App\Services\Finance;

use App\Models\BaseModel;
use App\Models\Finance\PaymentRequest;
use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * @return Collection
     */
    public function getUserAccounts(): Collection
    {
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

}
