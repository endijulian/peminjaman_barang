<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $fillable = [
        'barang_id',
        'users_id',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'note_barang',
        'jumlah',
        'status_pengajuan_id'
    ];

    public function barang()
    {
        return $this->belongsTo('App\Models\Barang', 'barang_id', 'id');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa', 'siswa_id', 'id');
    }

    public function status_peminjaman()
    {
        return $this->belongsTo('App\Models\StatusPeminjaman', 'status_peminjaman_id', 'id');
    }

    public function status_pengajuan()
    {
        return $this->belongsTo('App\Models\StatusPengajuan', 'status_pengajuan_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }
}
