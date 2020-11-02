<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Tests\Fixtures\User;

class Follows extends Model
{
    protected $fillable = [
        'user_id', 'following_user_id',
      ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}