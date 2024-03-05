<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultadCurso extends Model
{
    use HasFactory;

    protected $fillable = [
        'facultad_id',
        'curso_id'
    ];

    #Traer la info de los cursos
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}
