<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Admin\HomeService;


class HomeController extends Controller
{
    // Show pages Home
    protected $homeService;

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    public function home()
    {
        $datas = $this->homeService->notification();

        return view('admin::pages.home', ['datas' => $datas]);
    }

    public function accountList()
    {
        return view('admin::pages.account_owner');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function deleteAccount(Request $request)
    {
        $accountId = $request->account_id;
        $this->accountService->deleteAccount($accountId);

        return redirect()->route('admin.accounts.list')->with('status', 'Xóa thành công!');
    }

    public function createAccount() {
        $users = $this->accountService->getUsers();

        return view('admin::accounts.create', ['title' => 'Tạo nhóm', 'users' => $users]);
    }

    public function addAccount(Request $request)
    {
        $data = $request->only('name_account','user_id');
        $newaccounts = $this->accountService->addaccount($data);

        return redirect()->route('admin.accounts.list')->with('status', 'Tạo thành công!');
    }

    public function editAccount($id) 
    {
        $account = $this->accountService->editaccount($id);
        $users = $this->accountService->getUsers();

        return view('admin::accounts.edit', ['title' => 'Sửa thông tin'], ['account' => $account, 'users' => $users]);
    }

    public function updateAccount(Request $request, $id) 
    {
        $data = $request->only('name_account', 'user_id');
        $updateaccounts = $this->accountService->updateaccount($data, $id);

        return redirect()->route('admin.accounts.list')->with('status', 'Sửa thành công!');
    }
}
