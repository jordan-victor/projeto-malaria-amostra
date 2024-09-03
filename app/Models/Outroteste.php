<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outroteste extends Model
{
    use HasFactory;
    protected $table = 'outroteste';

    public $timestamps = false;

    protected $primaryKey = 'id_not';

    protected $fillable = [
        'cod_noti',
        'res_exame',
        'dt_noti',
        'tp_exame',
        'nm_paciente',
        'dt_nasci',
        'id_pacie',
        'id_dimea',
        'id_lvc',
        'loc_infec',
        'dt_sinto',
        'dt_trata',
        'semana',
        'sem_noti'
    ];
}
