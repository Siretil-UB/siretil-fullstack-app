<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function getForm(){
        return view("welcome");
    }

    public function authenticate(Request $request){

        if(!isset($request->nim) || !isset($request->password)){
            return back()->withErrors([
                'error' => 'username/password kosong',
            ]);
        }

        $credentials = $request->validate([
            'nim' => ['required', 'max:15'],
            'password'=>['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'error' => 'username/password salah',
        ]);
    }
}
