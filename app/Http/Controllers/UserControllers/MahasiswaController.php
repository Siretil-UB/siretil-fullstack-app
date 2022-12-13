<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Ketua;
use App\Models\Tim;
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
        $mahasiswa = Auth::user()->mahasiswa;

        $pesanDataBerhasilDiunggah = $mahasiswa->setData($request->nama, $request->role, $request->nomorWA, $request->cv);

        if($pesanDataBerhasilDiunggah){
            return view('home', ['pesan'=>'Data berhasil diunggah!']);
        }

        return view('home', ['error'=>'Data gagal terunggah. Silakan coba kembali!']);
    }

    public function reqMenuBuatTim()
    {
        return view('home');
    }

    public function batalBuatTim()
    {
        return view('home');
    }

    public function reqBuatTim(Request $request)
    {
        $input = $request->validate([
            'nama' => 'required|unique:tim,namaTim|max:20',
            'namaTim' => 'required|max:20',
            'lomba' => 'required|max:20',
            'anggota' => 'array'
        ]);

        $user = Auth::user();

        $succesCreatedKetua = Ketua::createKetua($user->nim,$input['nama']);
        $succesCreatedTim = Tim::createTim($input['nama'],$user->nim,$input['lomba'],$input['anggota']);

        if($succesCreatedKetua && $succesCreatedTim){
            return view('home',['success'=>'Tim telah dibuat!']);
        }

        return view('home',['error'=>'Tim gagal dibuat. Silakan coba kembali!']);
    }

    public function reqMenuCariTim()
    {
        return view('home');
    }

    public function reqTim(Request $request)
    {
        $input = $request->validate([
            'keyword' => 'required|string'
        ]);

        $result = Tim::getTim($input['keyword']);

        if(sizeof($result)>0){
            return view('home',['data'=>$result]);
        }

        return view('home', ['error'=>'Tim tidak ada!']);
    }
}
