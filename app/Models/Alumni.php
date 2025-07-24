<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumnis';
    protected $fillable = ['id', 'nama', 'tempat_lahir', 'tanggal_lahir', 'no_telepon', 'nama_ortu', 'pekerjaan_ortu', 'alamat', 
    'username', 'nomor_induk', 'jurusan', 'tahun_lulus', 'status', 'nama_perusahaan', 'tahun_bekerja', 'informasi_pekerjaan', 
    'created_at', 'updated_at'];
}
