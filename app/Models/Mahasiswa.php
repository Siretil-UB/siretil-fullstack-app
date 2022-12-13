<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
            $this->save();
            $this->user->save();

            return true;
        } catch (\Throwable $th) {
            // print_r($th);
            return false;
        }
    }

    public static function getMahasiswa($keyword)
    {
        $result = Mahasiswa::join('users', 'NIM_Mahasiswa', '=', 'Pengguna_NIM')
        ->where('nama', 'LIKE', "%$keyword%")
        ->orWhere('role', 'LIKE', "%$keyword%")
        ->orWhere('wa', 'LIKE', "%$keyword%")->get();

        return $result;
    }

    public function profileFo()
    {
        return ['nama'=>$this->user->nama, 'role'=>$this->role, 'cv'=>$this->cv, 'wa'=>$this->wa, 'nim'=>$this->user->nim];
    }
}
