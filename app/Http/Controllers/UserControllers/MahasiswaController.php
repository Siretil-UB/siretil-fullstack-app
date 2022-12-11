<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function getProfile(){
        /**
         * isinya derivative array
         * ['nama', 'role', 'cv', 'wa', 'nim']
         */
        $profileInfo = Auth::user()->mahasiswa->profileFo();
        return view('home', ['profileInfo'=>$profileInfo]);
    }

    public function reqMenuUnggahData()
    {
        return view('home');
    }

    public function batalUnggahData()
    {
        return redirect('home');
    }

    // logic finish
    public function reqUnggah(Request $request)
    {
        $request = new Request(['nama'=>'yo', 'role'=>'yo', 'nomorWA'=>'yo', 'cv'=>'cv']);
        $mahasiswa = Auth::user()->mahasiswa;

        $pesanDataBerhasilDiunggah = $mahasiswa->setData($request->nama, $request->role, $request->nomorWA, $request->cv);

        if($pesanDataBerhasilDiunggah){
            return view('home', ['pesan'=>'Data berhasil diunggah!']);
        }
    }

    // logic finish
    public function reqMahasiswa(Request $request)
    {
        $input = $request->validate([
            'input'=>'required'
        ]);

        $result = Mahasiswa::getMahasiswa($input['input']);

        return view('home', ['result'=>$result]);
    }
}
