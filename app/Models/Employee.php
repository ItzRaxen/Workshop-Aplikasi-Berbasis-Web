<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $table = 'employees';

    // PASTIKAN SEMUA FIELD ADA DI SINI, TERMASUK departemen_id
    protected $fillable = [
    'nama_lengkap',
    'email',
    'nomor_telepon',
    'tanggal_lahir',
    'alamat',
    'tanggal_masuk',
    'status',
    'jabatan_id',
    ];

}
