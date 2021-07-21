<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'stok',
        'photo',
    ];

    public function jurusan()
    {
        return $this->belongsTo('App\Models\Jurusan', 'jurusan_id', 'id');
    }

    public function status_peminjaman()
    {
        return $this->belongsTo('App\Models\StatusPeminjaman', 'status_peminjaman_id', 'id');
    }
}
