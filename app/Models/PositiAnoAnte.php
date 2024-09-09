<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositiAnoAnte extends Model
{
    use HasFactory;
    protected $table = 'posit_ano_anterior';
    public $timestamps = false;
    protected $primaryKey = 'semana';

    protected $fillable = [
        'ano_2022',
        'ano_2023'
    ];
}
