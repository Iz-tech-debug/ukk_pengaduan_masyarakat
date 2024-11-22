<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'log_aktivitas';

    protected $primaryKey = 'id_log';

    protected $fillable = [
        'id_petugas',
        'keterangan',
    ];
}
