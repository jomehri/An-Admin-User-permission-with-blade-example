<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Finance\UserPaymentRequestStore;
use App\Interfaces\Services\Finance\IFinanceService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Controllers\BaseController;

class DashboardController extends BaseController
{

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
        return view('dashboard.user-view', [
            'user' => Auth::user(),
            'userAccounts' => $this->financeService->getUserAccounts(),
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


}
