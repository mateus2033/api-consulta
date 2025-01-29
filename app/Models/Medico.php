<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'medicos';

    protected $fillable = [
        'id',
        'nome',
        'especialidade',
        'cidade_id'
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class ,'cidade_id', 'id');
    }

    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class, 'consultas', 'medico_id', 'paciente_id')->withPivot('id','data')->as('consulta'); ;
    }
}