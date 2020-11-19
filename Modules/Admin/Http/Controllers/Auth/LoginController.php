<?php

namespace Modules\Admin\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Admin\AdminAuthService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('admin.admins_home');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function FormLogin()
    {
        return view('admin::auth.login', ['title' => 'Đăng nhập']);
    }
    
    public function logout(Request $request)
    {
        $this->guard()->logout();
        return redirect()->guest(route( 'admin.form_login' ));
    }
}
