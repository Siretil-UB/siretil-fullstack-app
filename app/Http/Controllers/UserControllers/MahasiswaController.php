<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
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
        return redirect('home');
    }

    public function reqUnggah(Request $request)
    {
        $mahasiswa = Auth::user()->mahasiswa;

        $pesanDataBerhasilDiunggah = $mahasiswa->setData($request->nama, $request->role, $request->nomorWA, $request->cv);

        if($pesanDataBerhasilDiunggah){
            return view('home', ['pesan'=>'Data berhasil diunggah!']);
        }
    }

    public function reqMahasiswa(Request $request)
    {
        $input = $request->validate([
            'input'=>'required'
        ]);

        $result = Mahasiswa::getMahasiswa($input['input']);
    }
}
