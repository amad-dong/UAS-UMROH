<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepulanganUmroh extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'kepulangan_umrohs';

    // Kolom yang dapat diisi
    protected $fillable = [
        'nama_jemaah',
        'tanggal_kepulangan',
        'status_kepulangan',
        'catatan',
    ];
}
