<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidade extends Model
{
    use HasFactory;

    protected $table = 'localidades';
    public $timestamps = false;
    protected $primaryKey = 'id_loc';

    protected $fillable = [
        'cod_local',
        'nm_local',
        'mun_ibge',
        'latitude',
        'longitude'
    ];
}
