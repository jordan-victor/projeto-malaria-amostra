<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rural extends Model
{
    use HasFactory;

    protected $table = 'positivo_localidade_rural';
    public $timestamps = false;
    protected $primaryKey = 'CODIGO';

    protected $fillable = [
        'RES_EXAME',
        'LVC'
    ];
}
