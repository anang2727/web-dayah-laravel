<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $fillable = [
      'nama_santri',
      'nik',
      'no_kk',
      'alamat',
      'tgl_lahir',
      'nama_ayah',
      'nama_ibu',
      'tgl_masuk',
      'image',
    ];
}
