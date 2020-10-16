<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable ,Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute()
    {
        return "https://picsum.photos/200?u=* .$this->email";
    }

    public function timeline()
    {
        //return Tweet::where('user_id', $this->id)->latest()->get();

        // include all fo the user tweets
        // as well as the tweets of everyone
        // they follow .. in descending order by date.

        $friends = $this->follows()->pluck('id');
        //$ids->push($this->id);

        return Tweet::whereIn('user_id', $friends)
        ->orWhere('user_id', $this->id)
            ->latest()->get();
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }
    

    public function path($append = '')
    {
        $path = route('profile', $this->name);
        return $append ? "{$path}/{$append}" : $path;
    }


    /* This method returns the value=>name of the auth()::user | Column name in the users table is also name 
    (User table which is build by laravel auth) */
    
    public function getRouteKeyName()
    {
        return 'name';
    }
    
}