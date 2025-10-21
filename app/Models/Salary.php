<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'pay_date',
        'amount',
        'bonus',
        'deductions',
        'total_amount',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}