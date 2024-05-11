<?php

namespace App\Http\Controllers\tweet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class TweetStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): \Illuminate\Http\RedirectResponse
    {
        $tweet = new Tweet();



        $tweet->user_id = Auth::id(); // Use Auth::id()
        $tweet->content = request('content');

        $tweet->save();

        return back(); // Use back() function directly
    }
}
