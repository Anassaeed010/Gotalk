<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTweetRequest;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    function index()
    {
        $tweets = Tweet::query()
            ->where('parent_tweet_id', null)
            ->orderByDesc('created_at')
            ->limit(20)
            ->get();

        return view('index', compact('tweets'));
    }

    function view(Tweet $tweet)
    {
        return view('tweet.view', compact('tweet'));
    }

    function store(StoreTweetRequest $request)
    {
        $tweet = Auth::user()->tweets()->create($request->validated());

       if ($request->filled('parent_tweet_id')) {
    $parentTweet = Tweet::find($request->parent_tweet_id);
    $tweet->parentTweet()->associate($parentTweet);
    $tweet->baseTweet()->associate($parentTweet->baseTweet ?? $parentTweet);
} else {
    $tweet->baseTweet()->associate($tweet);
}
$tweet->save();


        $tweet->save();
        return redirect()->back();
    }
}
