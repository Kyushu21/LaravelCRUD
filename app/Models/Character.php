<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    // Campos que pueden ser asignados en masa
    protected $fillable = [
        'Nombre',
        'Alias',
        'Edad',
        'Genero',
        'Meta',
        'Foto', // Asegúrate de incluir este campo si es que también lo estás usando
    ];
}
