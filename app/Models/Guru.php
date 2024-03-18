<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_guru',
        'no_ktp',
        'alamat',
        'tgl_lahir',
        'pekerjaan',
        'pendidikan_terakhir',
        'image',
      ];
}
