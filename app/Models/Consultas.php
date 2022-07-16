<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultas extends Model
{
    use HasFactory;
    protected $table = 'consultas';
    protected $fillable = ['nombre', 'apPaterno', 'apMaterno', 'fechaConsulta', 'motivo', 'diagnostico', 'tratamiento', 'observaciones'];
}
