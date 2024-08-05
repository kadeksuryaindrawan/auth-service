<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use PDO;

class LoginController extends Controller
{
    use \Illuminate\Foundation\Auth\AuthenticatesUsers;

    // protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // Validasi input
        $this->validateLogin($request);

        // Check credentials
        if (Auth::attempt($request->only('username', 'password'))) {
            // Successful login, create token and redirect
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            User::where('id',$user->id)->update([
                'token' => $token
            ]);
            // return redirect('http://127.0.0.1:8001/?token=' . $token);
            if($user->role == 'perguruantinggi'){
                return redirect('http://127.0.0.1:8001?id=' . $user->id);
            }
            else if($user->role == 'desa'){
                return redirect('http://127.0.0.1:8002?id=' . $user->id);
            }else{
                return redirect()->back();
            }

        }

        // Failed login
        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'username' => [trans('auth.failed')],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
