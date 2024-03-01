<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;


class AuthController extends Controller
{
    //
    function showloginform(){

        return view('admin.auth.login');
    }
    function login(Request $request){
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'الايميل او كلمة السر غير صحيحة',
        ])->onlyInput('email');


    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('admin/login');
    }
}
