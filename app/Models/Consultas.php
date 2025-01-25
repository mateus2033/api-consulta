<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultas extends Model 
{
    use HasFactory, SoftDeletes;

    protected $table = 'medicos';

    protected $fillable = [
        'id',
        'medico_id',
        'paciente_id',
        'data'
    ];
}