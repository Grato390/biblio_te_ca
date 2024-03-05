<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facultad extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'bibliotecario';

    protected $fillable = [
        'nombre',
        //  aqui falta uno ---------------
        'biblioteca_id',
    ];

    #Llamamos a los hijos de facultad
    public function usuario()
    {
        return $this->hasMany(Usuario::class, 'bibliotecario_id');
    }

    #Llamamos al padre de Bibliotecario
    public function biblioteca()
    {
        return $this->belongsTo(Biblioteca::class, 'biblioteca_id');
    }

    #LLamamos a la relacion de *-* para los cursos
    public function recerva()
    {
        return $this->hasMany(Recerva::class, 'bibliotecario_id');
    }
}
