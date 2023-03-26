<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();



            return response()->json([
                'message' => 'Authenticated',
                'user' => $user,
                'access_token' => $user->createToken('auth_token')->plainTextToken
            ]);
        }

        throw ValidationException::withMessages([
            'email' => 'Invalid credentials'
        ]);
    }
}
