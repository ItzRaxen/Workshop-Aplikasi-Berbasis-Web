<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory; 

    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'status',
        'department_id', 
        'position_id',   
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    
    public function position()
{
    return $this->belongsTo(Position::class, 'position_id');
}

    public function attendances()
    {
        return $this->hasMany(Attendance::class,'attendance_id');
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class,'salaries_id');
    }
}