<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'nama_customer',
        'alamat_instansi',
        'unit',
        'unit_non_salary',
        'nominal_non_salary',
        'pendapatan',
        'keterangan',
    ];  
}
