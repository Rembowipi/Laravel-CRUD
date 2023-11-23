<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $table = 'pinjam';
    protected $fillable = [
        'id_pinjam',
        'peminjam',
        'tgl_pinjaman',
        'nama_barang',
        'jumlah',
        'tgl_kembali',
        'kondisi',
    ];
}
