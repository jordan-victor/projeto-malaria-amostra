<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;
    protected $table = 'disa';
    protected $primaryKey = 'id_disa';
    public $timestamps = false;

    protected $fillable = [
        'cod_disa',
        'nm_disa'
    ];
}
