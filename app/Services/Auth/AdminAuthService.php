<?php
namespace App\Services\Auth;

use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Auth;

class AdminAuthService {
    use ApiResponseTrait;

    public function login($request) {
        $credentials = $request->only('email', 'password');
        if(!Auth::attempt($credentials)) {
            return $this->returnUnAuthorizedError(['message' => 'Unauthorized']);
        }
        Auth::shouldUse('admin');
        $user = Auth::user();
        // $data['access_token'] = $user->createToken('myApp')->accessToken;
        $data['user'] = $user;
        $data['user']['type'] = 'admin';
        
        return $this->returnSuccess($data);
    }

    public function register($request) {
        $data = [
            'name'  => $request->name,
            'email' => $request->email,
            'password'  => bcrypt($request->password)
        ];
        // Admin::create($data);

        return $this->returnSuccess();
    }

    public function logout($request) {
        $token = $request->user()->token();
        $token->revoke();

        return $this->returnSuccess(['mes' => 'You have been succesfully logged out!']);
    }
}
