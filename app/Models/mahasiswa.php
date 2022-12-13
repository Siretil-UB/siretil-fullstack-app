<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primary_key = "Pengguna_NIM";

    protected $fillable = ['Pengguna_NIM', 'cv', 'role', 'wa'];

    public function user()
    {
        return $this->belongsTo(User::class, 'Pengguna_NIM', 'NIM_Mahasiswa');
    }
}
