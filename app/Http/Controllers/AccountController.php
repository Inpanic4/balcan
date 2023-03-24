<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;


class AccountController extends Controller
{


    public function index()
    {

        return view('account', [
            'token' => Auth::user()->token,

        ]);
    }
}
