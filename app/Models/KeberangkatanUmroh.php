<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeberangkatanUmroh extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit
    protected $table = 'keberangkatan_umrohs';

    // Kolom-kolom yang boleh diisi secara massal
    protected $fillable = [
        'nama_jamaah',
        'tanggal_keberangkatan',
        'paket',
        'harga',
        'status',
    ];
}
