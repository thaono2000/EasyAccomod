<?php

namespace Modules\Owner\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Owner;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function showFormRegister() {
        return view('owner::auth.register');
    }

    public function Register(Request $request) {
        $data = $request->only('full_name', 'email', 'password', 'phone', 'identity');
        $data['password'] = bcrypt($data['password']);
        $data['status'] = 0;
        Owner::create($data);

        return redirect()->route('owner.form_login')->with(['status' => 'Tài khoản đang chờ phê duyệt']);
    }
}
