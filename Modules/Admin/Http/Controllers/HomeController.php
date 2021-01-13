<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Admin\HomeService;
use App\Models\MoreExtend;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

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
        return view('admin::pages.home', ['admin' => Auth::user()]);
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

    // public function isRead(){
    //     AdminNotification::get()->update('is_read', '0');
    // }
    public function listExtend() {
        return view('admin::pages.post_extend', ['extends' => MoreExtend::paginate(8)]);
    }

    public function approvalExtend($id) {
        $more_extend = MoreExtend::find($id);
		$more_extend->motel->update(['extend' => $more_extend->more_extend]);
		Notification::create(['notification' => 'Bài đăng của bạn đã được gia hạn thành công',
							'is_read' => '1', 'owner_id' => $more_extend->owner_id, 'status' => '1'
                            ]);
        $more_extend->delete();
    }

    public function refuseExtend($id) {
        $more_extend = MoreExtend::find($id);
		// $more_extend->motel->update(['extend' => $more_extend->more_extend]);
		Notification::create(['notification' => 'Bài đăng của bạn đã bị từ chối gia hạn',
							'is_read' => '1', 'owner_id' => $more_extend->owner_id, 'status' => '0'
                            ]);
        $more_extend->delete();
    }
}
