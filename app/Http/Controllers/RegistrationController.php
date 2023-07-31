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
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        
        auth()->login($user);
        
        return view('dashboard', compact('user'));
    }
}

