<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class TokenController extends Controller
{
    public function checkToken(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ]);

        if ($request->token == Auth::user()->token) {
            // token is valid, allow user to proceed
            return response()->json([
                'message' => Auth::user()->events,
            ]);
        } else {
            // token is invalid, deny access
            throw ValidationException::withMessages([
                'token' => 'Invalid token',
            ]);
        }
    }
}
