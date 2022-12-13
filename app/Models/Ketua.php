<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Ketua extends Model
{
    use HasFactory;

    protected $table = 'ketua';
    protected $primaryKey = 'Pengguna_NIM';

    protected $fillable = ['Pengguna_NIM'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'Pengguna_NIM', 'NIM_Ketua');
    }

    public function tim()
    {
        return $this->belongsTo(Tim::class, 'Pengguna_NIM', 'Ketua_Pengguna_NIM');
    }

    public function profileFo()
    {
        return ['nama'=>$this->user->nama, 'nim'=>$this->user->nim];
    }

    public static function createKetua($nim, $nama)
    {
        try {
            $user = User::where('nim', $nim)->firstOrFail();
            $user->isKetua = true;
            $user->NIM_Ketua = $nim;

            $ketua = new Ketua();
            $ketua->Pengguna_NIM=$nim;

            $user->saveOrFail();
            $ketua->saveOrFail();
            return true;
        } catch (\Throwable $th) {
            print($th);
            return false;
        }
    }

    public static function deleteKetua($namaKetua)
    {
        try {
            $user = User::where('nama', $namaKetua)->firstOrFail();
            $ketua = $user->ketua;
            $key = $user->nim;

            $mahasiswa = new Mahasiswa();
            $mahasiswa->Pengguna_NIM = $key;
            $user->NIM_Ketua=null;
            $user->isKetua=false;
            $user->NIM_Mahasiswa=$key;

            $mahasiswa->saveOrFail();
            $user->saveOrFail();
            $ketua->deleteOrFail();

            return true;
        } catch (\Throwable $th) {
            print($th);

            return false;
        }
    }

    public function sendMsg($nim){
        Log::info("Mahasiswa dengan nim $nim melakukan pengajuan masuk tim Anda");
    }
}
