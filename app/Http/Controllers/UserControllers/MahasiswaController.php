<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Ketua;
use App\Models\Pengajuan;
use App\Models\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function getHome()
    {
        return view(
            'home',
            [
                'page' => 'home',
                'user' => Auth::user()->nama,
                'isKetua' => false
            ]
        );
    }

    public function getProfile(){
        /**
         * isinya derivative array
         * ['nama', 'role', 'cv', 'wa', 'nim']
         */
        // $profileInfo = Auth::user()->mahasiswa->profileFo();
        return view('profile', [
            'user'=>Auth::user(),
            'page'=>'profile',
            'isKetua'=>false
        ]);
    }

    public function getTim() {
        return view('team', [
            'page'=>'team',
            'isKetua'=>false
        ]);
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

        $tim = Tim::all();

        $timData = array();
        foreach ($tim as  $v) {
            array_push($timData,$v->getAttributes());
        }

        return view('search', [
            'page' => 'search',
            'isKetua' => false,
            'tim' => $timData
        ]);
    }

    public function reqTim(Request $request)
    {
        $input = $request->validate([
            'keyword' => 'required|string'
        ]);

        $result = Tim::getTim($input['keyword']);

        if(sizeof($result)>0){
            $resultData = array();
            foreach ($result as $r) {
                array_push($resultData,$r->getAttributes());
            }
            return view('search',[
            'data'=>$resultData,'page' => 'search',
            'isKetua' => false,
            ]);
        }

        return view('search', ['error'=>'Tim tidak ada!','page' => 'search',
        'isKetua' => false,]);
    }

    public function reqGabungTim(Request $request)
    {
        $input = $request->validate([
            'namaTim' => 'required',
            'nimKetua' => 'required',
            'nimMahasiswa' => 'required'
        ]);

        $nimMahasiswa = Auth::user()->mahasiswa->nim;

        try {
            $pengajuan = new Pengajuan;
            $pengajuan->Tim_Ketua_Pengguna_NIM = $input['nimKetua'];
            $pengajuan->Tim_namaTim = $input['namaTim'];
            $pengajuan->Mahasiswa_Pengguna_NIM = $nimMahasiswa;
            return redirect()->route('home',['result'=>'Berhasil mengajukan gabung']);
        } catch (\Throwable $th) {
            return redirect()->route('home',['error'=>'Gagal mengajukan gabung']);
        }
    }
}
