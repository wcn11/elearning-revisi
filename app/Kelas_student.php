<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas_student extends Model
{
    protected $keyType = "string";

    protected $primaryKey = "kode_kategori_kelas";
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = ['kode_kelas_student', 'kode_kategori_kelas', 'kode_kelas', 'id_student'];
}
