<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Profiler\Profile;




class Profilecontroller extends Controller
{
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('admin.dashboard', $data);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login')->with('Success', 'You have been Successfully logged out');
    }

    public function change_password()
    {
        return view('admin.users.change_password');
    }

    public function update_password(PasswordRequest $request)
    {
        $user=Auth::user();
        $oldPassword=$user->password;
        // dd($oldPassword);
        $request->old_password;
        if(Hash::check($request->old_password,$oldPassword)){
            $user->password=Hash::make($request->new_password);
            $user->save();
            return response()->json(['message' =>"Password change succesfully"]);
        }else{
            return response()->json(['message' =>"Old password is wrong",'status' =>422]);
        }
        // return view('admin.users.change_password');
    }
    
    
}
