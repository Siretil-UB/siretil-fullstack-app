<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';

    protected $fillable = ['Tim_Ketua_Pengguna_NIM','Tim_namaTim','~'];
    public $timestamps = false;

    // public function __construct() {
        // Auth::user()->ketua->sendMsg("created!");
    // }

    public function tim()
    {
        return $this->hasOne('tim','namaTim','Tim_namaTim');
    }

}
