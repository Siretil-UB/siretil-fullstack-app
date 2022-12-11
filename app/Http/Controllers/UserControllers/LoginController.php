<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function getForm(){
        return view('login');
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

            return redirect('/');
        }

        return back()->withErrors([
            'error' => 'username/password salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function getDashboard(){
        return view('home', ['username'=>Auth::user()->nama,'page' => 'home']);
    }
}
