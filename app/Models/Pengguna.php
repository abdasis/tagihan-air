<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    public function dataPeengeluaran()
    {
        return $this->hasMany(Pengeluaran::class, 'pengguna', 'id');
    }
}
