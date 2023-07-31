<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Validator;

class Usercontroller extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('admin.dashboard', $data);
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('admin.login')->with('Success','You have been Successfully logged out');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
