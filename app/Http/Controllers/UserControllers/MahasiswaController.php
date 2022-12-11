<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function getProfile(){
        $user = Auth::user();
        $profileInfo = ['name'=>$user->nama,'nim'=>$user->nim];
        $profileInfo['tes'] = 'tes';
        print_r($profileInfo);
    }

    public function reqMenuUnggahData()
    {
        return view('home');
    }

    public function batalUnggahData()
    {
        return view('home');
    }
}
