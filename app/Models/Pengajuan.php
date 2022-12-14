<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';

    public $timestamps = false;

    public function tim()
    {
        return $this->belongsTo(Tim::class, 'Tim_namaTim', 'namaTim');
    }

    public function mahasiswa(){
        return $this->hasOne(Mahasiswa::class, 'Pengguna_NIM', 'Mahasiswa_Pengguna_NIM');
    }

}
