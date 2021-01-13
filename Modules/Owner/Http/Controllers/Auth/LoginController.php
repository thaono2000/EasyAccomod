<?php

namespace Modules\Owner\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Owner;
use App\Models\Notification;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {                       
        $this->middleware('guest:owner')->except('logout');
    }

    // public function authenticate(Request $request)
    // {
    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //         // Authentication passed...
    //         return redirect()->route('owner.index');
    //     }
    // }

    protected function authenticated(Request $request, $user)
    {
        // if (Auth::guard('owner')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
        //     Authentication passed...
        //     return redirect()->route('owner.index');
        // }

        // return redirect()->route('owner.index');
    }

    public function login(Request $request) {
        if (Auth::guard('owner')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            $sum = 0;
            $owner = Owner::get()->where('email', $request->email);
            foreach($owner['0']->notifications as $notification) {
                $sum += $notification->is_read;
            }
                if(count($owner['0']->notifications) > 0 && $sum > 0) {
                    return redirect()->route('owner.index')->with(['notification' => 'Bạn có thông báo mới']);
                } else {
                    return redirect()->route('owner.index');
                }
        } else {
            return redirect()->back();
        }
    }

    protected function guard()
    {
        return Auth::guard('owner');
    }

    public function FormLogin()
    {
        return view('owner::auth.login', ['title' => 'Đăng nhập']);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        return redirect()->guest(route( 'owner.form_login' ));
    }

}
