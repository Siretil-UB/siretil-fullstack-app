<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $fillable = ['Tim_Ketua_Pengguna_NIM','Tim_namaTim','Mahasiswa_Pengguna_NIM'];

    public $timestamps = false;

}
