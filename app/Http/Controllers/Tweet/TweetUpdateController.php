<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet; // Include the Tweet model
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TweetUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * This method retrieves a specific tweet based on the provided ID, updates its content,
     * and then redirects back to the previous page.
     *
     * @param int $id The unique identifier of the tweet to be updated
     * @return \Illuminate\Http\RedirectResponse The redirect response after updating the tweet
     */
    public function __invoke($id): RedirectResponse
    {
        $tweet = Tweet::find($id);

        $tweet->update([
            'content' => request('content'),
        ]);

        // Call the back() method on the redirector object to redirect to the previous page
        return redirect()->route('timeline');
    }
}
