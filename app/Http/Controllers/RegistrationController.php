<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration');
    }

    public function store(UserRegistrationRequest $request)
    {
        $existingUser = User::where('email', $request->email)->first();
        // dd($existingUser);
        if ($existingUser) {

            
            return redirect()->route('user.register')->with('message','A user with this email address already exists.');
        }

        $user = User::create(request(['name', 'email', 'password']));

        auth()->login($user);

        return redirect()->route('dashboard');
    }
    
}
