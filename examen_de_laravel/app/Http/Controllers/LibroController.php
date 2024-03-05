<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->all();
        $libro = Libro::create([
            'nombre_libro' => $params['nombre_libro'],
            'numero_de_paguinas' => $params['numero_de_paguinas'],
            'cantidad_disponible' => $params['cantidad_disponible'],
            'bibliotecario_id' => $params['bibliotecario_id']
        ]);

        return $libro;
    }

    public function index(Request $request)
    {
        $params = $request->all();
        $size = isset($params['size']) ? $params['size'] : 5;

        $libros = Libro::with('usuario.bibliotecario.biblioteca')->where('bibliotecario_id', $params['bibliotecario_id'])
            ->limit($size)->get();

        return $libros;
    }

    public function show($id)
    {
        $libro = Libro::find($id);

        return $libro;
    }

    public function update($id, Request $request)
    {
        $params = $request->all();
        Libro::find($id)->update([
            'nombre_libro' => $params['nombre_libro'],
            'numero_de_paguinas' => $params['numero_de_paguinas'],
            'cantidad_disponible' => $params['cantidad_disponible'],
            'bibliotecario_id' => $params['bibliotecario_id']
        ]);

        return 'Registro actualizado';
    }

    public function destroy($id)
    {
        Libro::find($id)->delete();

        return 'Registro eliminado';
    }
}


