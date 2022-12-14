<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = "Pengguna_NIM";

    protected $fillable = ['Pengguna_NIM', 'cv', 'role', 'wa'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'Pengguna_NIM', 'NIM_Mahasiswa');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'Pengguna_NIM', 'Mahasiswa_Pengguna_NIM');
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'Pengguna_NIM', 'Mahasiswa_Pengguna_NIM');
    }

    public function setData($nama, $role, $nomorWA, $cv)
    {
        try {
            if (isset($nama)) {
                $this->user->nama = $nama;
            }
            if (isset($role)) {
                $this->role = $role;
            }
            if (isset($nomorWA)) {
                $this->wa = $nomorWA;
            }
            if (isset($cv)) {
                $this->cv = $cv;
            }
            $this->saveOrFail();
            $this->user->saveOrFail();

            return true;
        } catch (\Throwable $th) {
            // print_r($th);
            return false;
        }
    }

    public static function getMahasiswa($keyword)
    {
        try {
            $result = Mahasiswa::join('users', 'NIM_Mahasiswa', '=', 'Pengguna_NIM')
            ->where('nama', 'LIKE', "%$keyword%")
            ->orWhere('role', 'LIKE', "%$keyword%")
            ->orWhere('wa', 'LIKE', "%$keyword%")->get();

            return $result;
        } catch (\Throwable $th) {
            print($th);
            return [];
        }
    }

    public function profileFo()
    {
        return ['nama'=>$this->user->nama, 'role'=>$this->role, 'cv'=>$this->cv, 'wa'=>$this->wa, 'nim'=>$this->user->nim];
    }

    public static function sendMsg($nim, $disetujui)
    {
        try {
            $receiver = User::all()->firstWhere($nim);

            if ($disetujui) {
                $disetujui = 'Selamat, Anda tergabung dalam tim!';
            } else {
                $disetujui = 'Mohon maaf, Anda masih belum memenuhi kualifikasi dari tim';
            }

            $message = new Message();
            $message->message = $disetujui;
            $message->sender = Auth::user()->nim;
            $message->receiver = $receiver->nim;
            $message->sent = now();

            return true;
        } catch (\Throwable $th) {
            print($th);

            return false;
        }
    }
}
