<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{   
    use Likable;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($tweet) {
            $tweet->user_id = auth()->user()->id;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}