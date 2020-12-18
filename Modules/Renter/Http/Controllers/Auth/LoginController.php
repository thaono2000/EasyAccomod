<?php

namespace Modules\Renter\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware('guest:renter')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('renter.index');
    }

    protected function guard()
    {
        return Auth::guard('renter');
    }

    public function FormLogin()
    {
        return view('renter::auth.login', ['title' => 'Đăng nhập']);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        return redirect()->guest(route( 'renter.form_login' ));
    }
}
