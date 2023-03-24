<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class TestCompaniesController extends Controller
{

    public function store(Request $request)
    {

        // check token
        if ($request->token == Auth::user()->token)


            // a view that is returned by a controller action can only be accessed by sending a request to that controller action
            return view('companies', [
                // get all records from test_companies table in json
                'companies' => json_encode(DB::table('test_companies')->get()),

            ]);

        else
            // Flash message if wrong token
            Session::flash('message', 'Error: Token is not correct');
        return redirect()->back();
    }
}
