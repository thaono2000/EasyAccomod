<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Owner;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Admin\AccountService;

class AccountController extends Controller
{
    //Quan hệ giữa Controller và Service là dependency injection

    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function waitListAccount()
    {
        $accounts = $this->accountService->waitListAccount();

        return view('admin::pages.account_owner_wait', ['accounts' => $accounts]);
    }

    public function successListAccount() {
        $accounts = $this->accountService->successListAccount();

        return view('admin::pages.account_owner_success', ['accounts' => $accounts]);
    }

    public function approvalAccount($id)
    {
        $this->accountService->approvalAccount($id);
    }

}
