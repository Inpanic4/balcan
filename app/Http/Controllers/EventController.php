<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class EventController extends Controller
{


    public function index()
    {


        return view('dashboard', [


            'events' => Auth::user()->events
        ]);
    }
}
