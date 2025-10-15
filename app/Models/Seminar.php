<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    protected $table = 'seminar';
    protected $primaryKey = 'id_seminar';
    protected $fillable = ['judul', 'deskripsi', 'foto', 'lokasi', 'waktu', 'kuota'];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'id_seminar');
    }
}
