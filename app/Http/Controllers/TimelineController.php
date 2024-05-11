<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Tweet;

class TimelineController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): view
    {
        return view('timeline' , [
            'tweets' => Tweet::latest('id')->get(),
        ]);
    }
}
