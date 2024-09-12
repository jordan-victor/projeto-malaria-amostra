<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    use HasFactory;

    protected $table = 'unidade_notificante';
    protected $primaryKey = 'id_unid';
    public $timestamps = false;

    protected $fillable = [
        'cod_unid',
        'uf_ibge',
        'nm_unid',
        'mun_ibge',
        'cod_local',
        'id_mun_unid',
        'cod_mun_loc'
    ];
}
