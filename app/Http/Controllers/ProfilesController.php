<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', compact('user') );
    }   

    public function edit(User $user)
    {
        //Another way to authorize the user edit. Only user can authorize its own profile 
        //$this->authorize('edit', $user);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {

        $attributes = request()->validate([
            'username' => [
                'string',
                'required',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore($user),
            ],

            'name' => [
                'string',
                'required',
                'max:255',
            ],

            'email' => [
                'email',
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user),
            ],

            'password' => [
                'string',
                'required',
                'min:8',
                'max:255',
                'confirmed',
            ]
        ]);

        $user->update($attributes);
        
        return redirect($user->path());

    }

}