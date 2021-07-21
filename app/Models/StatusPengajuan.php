<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPengajuan extends Model
{
    use HasFactory;

    protected $table = 'status_pengajuan';
    protected $fillable = [
        'name_pengajuan'
    ];
}
