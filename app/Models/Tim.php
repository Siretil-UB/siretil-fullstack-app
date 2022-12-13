<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    use HasFactory;

    protected $table = 'tim';
    protected $primaryKey = 'namaTim';

    protected $fillable = ['namaTim', 'ketua_pengguna_NIM', 'lomba'];

    public $timestamps = false;

    public function ketua()
    {
        return $this->hasOne(Ketua::class, 'Pengguna_NIM', 'ketua_pengguna_NIM');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'namaTim', 'Tim_namaTim');
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'namaTim', 'Tim_namaTim');
    }
    public static function createTim($namaTim, $ketua, $lomba, $anggota)
    {
        try {
            $tim = new Tim();
            $tim->namaTim = $namaTim;
            $tim->ketua_pengguna_NIM = $ketua;
            $tim->lomba = $lomba;

            $tim->saveOrFail();

            if(isset($anggota) && sizeof($anggota)>0){
                $allMahasiswa = Mahasiswa::all();

                foreach ($anggota as $nim) {
                    $mahasiswa = $allMahasiswa->find($nim)->firstOrFail();
                    $anggota = new Anggota();
                    $anggota->Tim_Ketua_Pengguna_NIM = $ketua;
                    $anggota->Tim_namaTim = $namaTim;
                    $anggota->Mahasiswa_Pengguna_NIM = $mahasiswa->Pengguna_NIM;
                    $mahasiswa->saveOrFail();
                }
            }
            return true;
        } catch (\Throwable $th) {
            print($th);
            return false;
        }
    }

    public static function getTim($keyword)
    {
        try {
            $result = Tim::where('namaTim', 'LIKE', "%$keyword%")
                        ->orWhere('Ketua_Pengguna_NIM','LIKE',"%$keyword%")
                        ->orWhere('lomba', 'LIKE', "%$keyword%")
                        ->get();
            print_r($result);
            return $result;
        } catch (\Throwable $th) {
            //throw $th;
            print($th);
            return [];
        }
    }

    public static function deleteTim($namaTim)
    {
        try {
            $tim = Tim::where('namaTim','=',$namaTim)->firstOrFail();
            $tim->deleteOrFail();
            return true;
        } catch (\Throwable $th) {
            print($th);
            return false;
        }
    }

    public function setKriteria($namaTim, $role, $jurusan, $fakultas)
    {
        try {
            $kriteria = new Kriteria();
            $kriteria->role = $role;
            $kriteria->jurusan = $jurusan;
            $kriteria->fakultas = $fakultas;
            $kriteria->Tim_Ketua_Pengguna_NIM = $this->ketua_pengguna_NIM;
            $kriteria->Tim_namaTim = $namaTim;

            $kriteria->saveOrFail();

            return true;
        } catch (\Throwable $th) {
            print($th);
            return false;
        }
    }
}
