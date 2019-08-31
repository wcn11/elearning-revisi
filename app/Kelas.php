<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $keyType = "string";

    protected $primaryKey = "kode_kelas";
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = ['kode_kelas', 'kelas'];

    public function kelas_ke_mp()
    {
        return $this->hasMany("App\Mentor_pelajaran", "kode_kelas");
    }
}
