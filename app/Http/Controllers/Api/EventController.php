<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {

        //  eager load the relationships using distinct() in model classes to avoid duplicates
        $events = Auth::user()->events()->with('topics.lessons.instructors')->get();

        return response()->json($events);
    }
}
// 1316
