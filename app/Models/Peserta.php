<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';
    protected $primaryKey = 'id_peserta';
    protected $fillable = ['nama', 'nim', 'prodi'];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'id_peserta');
    }
}
