<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin(){
        return view('admin.auth.login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //dd($request);
        $validated=auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'is_admin' => 1
        ], $request->password);
        if($validated){
            return redirect()->route('dashboard')->with('cuccess', 'Login successfull');
        }else{
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }
}
