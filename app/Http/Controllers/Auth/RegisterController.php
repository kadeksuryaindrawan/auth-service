<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/register', $request->only('username', 'email', 'password'));

        if ($response->successful()) {
            return redirect()->route('login')->with('status', 'Registration successful. Please log in.');
        }

        return back()->withErrors(['email' => 'Registration failed. Please try again.']);
    }
}
