<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ketua extends Model
{
    use HasFactory;

    protected $table = 'ketua';
    protected $primary_key = "Pengguna_NIM";

    protected $fillable = ['Pengguna_NIM'];

    public function user()
    {
        return $this->belongsTo(User::class, 'Pengguna_NIM', 'NIM_Ketua');
    }
}
