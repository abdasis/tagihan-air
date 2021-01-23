<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggunaan extends Model
{
    use HasFactory;
    public function dataPengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna');
    }
}
