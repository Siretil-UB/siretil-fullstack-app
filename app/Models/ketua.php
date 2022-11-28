<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ketua extends Model
{
    use HasFactory;

    protected $table = 'ketua';
    protected $primary_key = "Pengguna_NIM";
    public $timestamps = false;

    protected $fillable = ['Pengguna_NIM'];
}
