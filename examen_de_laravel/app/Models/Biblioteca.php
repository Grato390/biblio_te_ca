<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Universidad extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'universidades';

    protected $fillable = [
        'nombre',
        'direccion',
        'antiguedad',
    ];

    #Llamamos a los hijos de universidad
    public function facultades()
    {
        return $this->hasMany(Facultad::class, 'universidad_id');
    }
}
