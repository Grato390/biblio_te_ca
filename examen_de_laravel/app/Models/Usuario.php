<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'codigo_estudiante',         // ==========================
        'bibliotecario_id',
    ];

    #Padre de usuarios
    public function bibliotecario()
    {
        return $this->belongsTo(Bibliotecario::class, 'bibliotecario_id');
    }
}
