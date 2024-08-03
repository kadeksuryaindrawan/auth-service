<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Endpoint untuk mendapatkan CSRF cookie
Route::get('sanctum/csrf-cookie', function() {
    return response()->json(['status' => 'success']);
});

Route::middleware('auth')->get('/home', function (Request $request) {
    $user = Auth::user();
    $token = $user->createToken('authToken')->plainTextToken;
    User::where('id',$user->id)->update([
                'token' => $token
            ]);

    return redirect('http://127.0.0.1:8001');
})->name('home');
