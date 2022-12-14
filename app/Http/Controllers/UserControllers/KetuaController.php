<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Ketua;
use App\Models\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KetuaController extends Controller
{
    public function getHome()
    {
        return view(
            'home',
            [
                'page' => 'home',
                'user' => Auth::user()->nama,
                'isKetua' => true
            ]
        );
    }

    public function getTim()
    {
        try {
            $tim = Auth::user()->ketua->tim;
            $anggota = $tim->anggota;

            $tim = (array) $tim->getAttributes();
            $anggota = $anggota->mahasiswa->all();

            $dataAnggota = array();
            foreach ($anggota as $v) {
                $v['nama'] = $v->user->nama;
                array_push($dataAnggota, $v->getAttributes());
                // array_push($v, $v->mahasiswa);
            }
            $tim['anggota'] = $dataAnggota;

            return view('team',[
                'page' => 'team',
                'isKetua' => true,
                'tim' => $tim
            ]);
        } catch (\Throwable $th) {
            return view('team',[
                'page' => 'team',
                'user' => Auth::user()->nama,
                'isKetua' => true,
                'error' => $th,
                'tim'=> $tim
            ]);
        }
    }

    public function getProfile(){
        $profileInfo = Auth::user()->ketua->profileFo();
        return view('profile', [
            'page' => 'profile',
            'user' => Auth::user(),
            'isKetua' => true,
            'profileInfo'=>$profileInfo
        ]);
    }

    public function reqHapusTim(Request $request)
    {

        $input = $request->validate([
            'namaTim' => 'required',
            'namaKetua' => 'required'
        ]);

        $resultDeleteTim = Tim::deleteTim($input['namaTim']);
        $resultDeleteKetua = Ketua::deleteKetua($input['namaKetua']);

        if($resultDeleteKetua&&$resultDeleteTim){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

    }

    public function reqMahasiswa(Request $request)
    {
        $input = $request->validate([
            'keyword'=>'string'
        ]);

        $result = Mahasiswa::getMahasiswa($input['keyword']);

        if(sizeof($result)>0){
            return view('searchMhs', ['data'=>$result, 'page'=>'searchMhs', 'isKetua'=>true]);
        }

        return view('searchMhs', ['data'=>null, 'error'=>'Anggota tidak ada!', 'page'=>'searchMhs', 'isKetua'=>true]);
    }

    public function reqMenuCariAnggota(){
        return view('searchMhs', ['page'=>'searchMhs', 'isKetua'=>true]);
    }

    public function reqUnggah(Request $request)
    {
        $input = $request->validate([
            'namaTim' => 'max:20',
            'role' => 'required|10',
            'jurusan' => 'required|max:30',
            'fakultas' => 'required|max:30'
        ]);

        $user = Auth::user();
        $ketua = $user->ketua;
        $tim = $ketua->tim;

        $result = $tim->setKriteria($input['namaTim'],$input['role'],$input['jurusan'],$input['fakultas']);

        if($result){
            return view('home', ['result'=>'Kriteria berhasil diunggah!']);
        }
        return view('home', ['error'=>'Pesan berhasil diunggah!']);
    }

    public function reqMenuPengajuan()
    {
        try {
            $pengajuan = Auth::user()->ketua->tim->pengajuan->all();
            $dataPengajuan = array();

            foreach ($pengajuan as  $value) {
                array_push($dataPengajuan,$value->getAttributes());
            }

            return view('notification',['result'=>$dataPengajuan, 'page'=>'notification',]);
        } catch (\Throwable $th) {
            return view('notification',['error'=>'gagal mengambil data', 'page'=>'notification']);
        }
    }

    public function reqMenuUnggahKriteria()
    {
        return view('home');
    }

    public function batalUnggahKriteria()
    {
        return redirect()->route('kriteriaKetua');
    }
}
