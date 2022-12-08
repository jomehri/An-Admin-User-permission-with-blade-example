<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\BaseController;
use App\Interfaces\Services\Finance\IFinanceService;
use App\Http\Requests\Finance\UserPaymentRequestStore;
use App\Http\Requests\Finance\UserPaymentRequestReject;
use App\Http\Requests\Finance\UserPaymentRequestApprove;

class DashboardController extends BaseController
{
    /**
     * @param IFinanceService $financeService
     */
    public function __construct(IFinanceService $financeService)
    {
        $this->financeService = $financeService;
    }


    /**
     * User payment request view page
     *
     * @return View
     */
    public function view(): View
    {
        return view('dashboard.payment_request.user-view', [
            'user' => Auth::user(),
            'userAccounts' => $this->financeService->getUserAccounts(),
            'paymentRequests' => $this->financeService->getPendingPaymentRequests(),
        ]);
    }

    /**
     * User payment request save
     *
     * @param Request $request
     * @param UserPaymentRequestStore $userPaymentRequestStore
     * @return RedirectResponse
     */
    public function save(Request $request, UserPaymentRequestStore $userPaymentRequestStore): RedirectResponse
    {
        $this->financeService->savePaymentRequest($request);

        return redirect()->back()->with([
            'message' => 'Your payment request saved successfully'
        ]);
    }

    /**
     * User payment request save
     *
     * @param Request $request
     * @param UserPaymentRequestApprove $userPaymentRequestApprove
     * @return RedirectResponse
     */
    public function approvePaymentRequest(Request $request, UserPaymentRequestApprove $userPaymentRequestApprove): RedirectResponse
    {
        $this->financeService->approvePaymentRequest($request);

        return redirect()->back()->with([
            'message' => 'Payment request has been approved saved successfully'
        ]);
    }

    /**
     * User payment request save
     *
     * @param Request $request
     * @param UserPaymentRequestReject $userPaymentRequestApprove
     * @return RedirectResponse
     */
    public function rejectPaymentRequest(Request $request, UserPaymentRequestReject $userPaymentRequestApprove): RedirectResponse
    {
        $this->financeService->approvePaymentRequest($request);

        return redirect()->back()->with([
            'message' => 'Payment request has been approved saved successfully'
        ]);
    }


}
