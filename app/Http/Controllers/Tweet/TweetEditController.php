<?php

// app/Http/Controllers/Tweet/TweetEditController.php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet; // Include the Twee
use Illuminate\Support\Facades\Auth; // Import the Auth facade

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

        // Check if the current user is the owner of the tweet
        if ($tweet->user_id !== Auth::id()) {
            // Abort with a 401 error if the user is not authorized
            abort(401);
        }

        // Return the edit view with the tweet object
        return view('tweets.edit', [
            'tweet' => $tweet,
        ]);
    }
}
