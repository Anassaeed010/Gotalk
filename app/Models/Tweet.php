<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'content',
        'base_tweet_id',
        'parent_tweet_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function baseTweet()
    {
        return $this->belongsTo(Tweet::class, 'base_tweet_id');
    }

    public function parentTweet()
    {
        return $this->belongsTo(Tweet::class, 'parent_tweet_id');
    }

    public function childTweets()
    {
        return $this->hasMany(Tweet::class, 'parent_tweet_id')->orderBy('created_at');
    }

    public function descendantTweets()
    {
        return $this->hasMany(Tweet::class, 'base_tweet_id');
    }
}
