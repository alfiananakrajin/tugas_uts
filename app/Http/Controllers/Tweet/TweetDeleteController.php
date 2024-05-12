<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;

class TweetDeleteController extends Controller
{
    public function destroy(Tweet $tweet)
    {
        $tweet->delete();

        return redirect()->route('timeline');
    }
}
