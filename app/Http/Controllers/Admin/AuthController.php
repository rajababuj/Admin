<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function getLogin(){
        // session()->put(['test'=>'test']);
      return view ('admin.auth.login');
    }

    public function postLogin(LoginRequest $request){
        // dd($request->all());
        $validated=Auth::guard('admin')->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        // dd(Hash::make($request->password));
        if($validated){
            return redirect()->route('admin.dashboard')->with('success', 'success Login Successfully');
        }else{
            return redirect()->back()->with('error', 'Invalid credentials');
        }

        
    
    }
    protected function guard()
    {
        return  Auth::guard('admin');
    }



   
}





