<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet; // Include the Tweet model

class TweetEditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * This method retrieves a specific tweet based on the provided ID and returns an edit view,
     * passing the tweet object to the view.
     *
     * @param int $id The unique identifier of the tweet to be edited
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View The edited tweet view
     */
    public function __invoke($id): \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        // Retrieve the tweet with the given ID
        $tweet = Tweet::find($id);

        // Return the edit view with the tweet object
        return view('tweets.edit', [
            'tweet' => $tweet,
        ]);
    }
}
