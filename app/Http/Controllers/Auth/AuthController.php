<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function verifyToken(Request $request)
    {
        $user = Auth::guard('api')->user();
        if ($user) {
            return response()->json(['user' => $user], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function getUserById($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    public function logoutUser(Request $request,$id)
	{
	    $user = User::find($id);
	    
	    if (!$user) {
	        return response()->json(['error' => 'User not found'], 404);
	    }
	    
	    $user->update(['token' => null]);

	    return response()->json(['message' => 'User logged out successfully'], 200);
	}
}
