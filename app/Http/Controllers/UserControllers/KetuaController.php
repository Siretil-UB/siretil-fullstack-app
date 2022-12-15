<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Ketua;
use App\Models\Message;
use App\Models\Pengajuan;
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
            'data'=>$profileInfo
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
            'keyword'=>'string|min:1'
        ]);

        $result = Mahasiswa::getMahasiswa($input['keyword']);

        if((gettype($result)=='object' && sizeof($result)<=0) || (!$result)){
            return view('searchMhs', ['data'=>null, 'error'=>'Anggota tidak ditemukan!', 'page'=>'searchMhs', 'isKetua'=>true]);
        }

        return view('searchMhs', ['data'=>$result, 'page'=>'searchMhs', 'isKetua'=>true]);

    }

    public function reqMenuCariAnggota(){
        return view('searchMhs', ['page'=>'search', 'isKetua'=>true]);
    }

    public function reqUnggah(Request $request)
    {
        $input = $request->validate([
            'namaTim' => 'max:20',
            'role' => 'required|max:10',
            'jurusan' => 'required|max:30',
            'fakultas' => 'required|max:30'
        ]);

        $user = Auth::user();
        $ketua = $user->ketua;
        $tim = $ketua->tim;

        $result = $tim->setKriteria($input['namaTim'],$input['role'],$input['jurusan'],$input['fakultas']);

        if($result){
            return redirect()->route('ketua-kriteria')->with('msg-success',"Berhasil menambahkan kriteria");
        }
        return redirect()->route('ketua-kriteria')->with('msg-failed',"Gagal menambahkan kriteria");
    }

    public function reqMenuPengajuan()
    {
        try {
            $pengajuan = Auth::user()->ketua->tim->pengajuan;
            $dataPengajuan = array();

            foreach ($pengajuan as  $value) {
                $data = $value->getAttributes();

                $dataResult = array(
                    'tim'=>$data['Tim_namaTim'],
                    'pengaju'=>$value->mahasiswa->user->nama,
                    'role'=>$value->mahasiswa->role,
                    'wa'=>$value->mahasiswa->wa,
                    'nim'=>$value->mahasiswa->user->nim,
                );

                array_push($dataPengajuan,$dataResult);
            }

            return view('notification',['data'=>$dataPengajuan, 'page'=>'notification','isKetua'=>true]);
        } catch (\Throwable $th) {
            return view('notification',['error'=>'gagal mengambil data', 'page'=>'notification','isKetua'=>true]);
        }
    }

    public function reqTolak(Request $request)
    {
        $request = new Request(['nim' => '205150201111002']);
        $input = $request->validate([
            'nim' => 'required|string'
        ]);

        try {
            $tim = Auth::user()->ketua->tim;
            $pengajuan = $tim->pengajuan->firstWhere('Mahasiswa_Pengguna_NIM', '=', $input['nim']);
            $nimMahasiswa = $pengajuan->mahasiswa->Pengguna_NIM;
            $pengajuan->deleteOrFail();

            $result = Mahasiswa::sendMsg($nimMahasiswa, false);

            if(!$result){
                return back()->with('error', 'Gagal menerima anggota baru!');
            }

            return back()->with('message', 'Selamat, Anda telah menerima anggota baru pada tim Anda!');
        } catch (\Throwable $th) {
            print_r($th);

            return back()->with('error', 'Gagal menerima anggota baru!');
        }
    }

    public function reqTerima(Request $request)
    {
        $request = new Request(['nim' => '205150201111002']);
        $input = $request->validate([
            'nim' => 'required|string'
        ]);

        try {
            $tim = Auth::user()->ketua->tim;
            $pengajuan = $tim->pengajuan->firstWhere('Mahasiswa_Pengguna_NIM', '=', $input['nim']);
            $nimMahasiswa = $pengajuan->mahasiswa->Pengguna_NIM;
            $pengajuan->deleteOrFail();

            $result = Mahasiswa::sendMsg($nimMahasiswa, true);

            if(!$result){
                return back()->with('error', 'Gagal menerima anggota baru!');
            }

            return back()->with('message', 'Selamat, Anda telah menerima anggota baru pada tim Anda!');
        } catch (\Throwable $th) {
            print_r($th);

            return back()->with('error', 'Gagal menerima anggota baru!');
        }
    }

    public function reqMenuUnggahKriteria()
    {
        $tim = Auth::user()->ketua->tim;
        $tim = $tim->getAttributes()['namaTim'];

        return view('kriteria', [
            'isKetua' => true,
            'page' => 'team',
            'tim' => $tim
        ]);
    }

    public function reqKriteria()
    {
        $tim = Auth::user()->ketua->tim;
        $kriteria = $tim->kriteria;

        $kriteriaData = array();
        foreach ($kriteria as  $k) {
            array_push($kriteriaData, $k->getAttributes());
        }

        return view('team_kriteria',[
            'page' => 'team',
            'isKetua' => true,
            'tim' => $kriteriaData
        ]);
    }

    public function batalUnggahKriteria()
    {
        print_r('yy');
        return redirect()->route('ketua-kriteria');
    }

    public function tes()
    {
    }
}
