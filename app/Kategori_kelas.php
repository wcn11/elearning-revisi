<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori_kelas extends Model
{
    protected $keyType = "string";

    protected $primaryKey = "kode_kategori_kelas";
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = ['kode_kategori_kelas', 'kategori_kelas', 'kelas'];
}
