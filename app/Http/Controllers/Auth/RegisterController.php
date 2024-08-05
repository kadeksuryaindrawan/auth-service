<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }
        try {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            if (Auth::attempt($request->only('username', 'password'))) {
                // Successful login, create token and redirect
                $user = Auth::user();
                $token = $user->createToken('authToken')->plainTextToken;

                User::where('id', $user->id)->update([
                    'token' => $token
                ]);
                // return redirect('http://127.0.0.1:8001/?token=' . $token);
                if ($user->role == 'perguruantinggi') {
                    return redirect('http://127.0.0.1:8001?id=' . $user->id);
                } else if ($user->role == 'desa') {
                    return redirect('http://127.0.0.1:8002?id=' . $user->id);
                } else {
                    return redirect()->back();
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
