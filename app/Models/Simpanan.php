<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    use HasFactory;

    protected $table = 'simpanans';
    protected $fillable = [
        'member_id',
        'tanggal',
        'jenis_simpanan',
        'jumlah',
        'keterangan'
    ];
}
