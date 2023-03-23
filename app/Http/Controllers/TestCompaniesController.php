<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TestCompaniesController extends Controller
{
    // public function index()
    // {
    //     return view('companies', [
    //         // 'token' => Auth::user()->token
    //     ]);
    // }

    public function store(Request $request)
    {

        if ($request->token == Auth::user()->token)


            // todo mabe add at user's session the token to protect the route
            return view('companies', [
                // get all records from test_companies table in json
                'companies' => json_encode(DB::table('test_companies')->get())
            ]);
        // dd(Auth::user());

        else
            // Flash message if wrong token
            Session::flash('message', 'Error: Token is not correct');
        return redirect()->back();
    }
}
