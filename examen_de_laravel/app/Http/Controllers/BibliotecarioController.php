

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bibliotecario;

class BibliotecarioController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->all();
        $bibliotecario = Bibliotecario::create([
            'nombre_bibliotecario' => $params['nombre_bibliotecario'],
            'anio_puesto' => $params['anio_puesto']
            'biblioteca_id' => $params['biblioteca_id']
        ]);

        return $bibliotecario;
    }

    public function index(Request $request)
    {
        #llamar a los atributos de nuestra peticion HTTP
        $params = $request->all();
        #ternario para reducir un IF
        $size = isset($params['size']) ? $params['size'] : 5;

        $bibliotecarios = Bibliotecario::with('biblioteca')->where('biblioteca_id', $params['biblioteca_id'])
            ->limit($size)->get();

        return $bibliotecarios;
    }

    public function show($id)
    {
        $bibliotecario = Bibliotecario::find($id);

        return $bibliotecario;
    }

    public function update($id, Request $request)
    {
        $params = $request->all();
        Bibliotecario::find($id)->update([
            'nombre_bibliotecario' => $params['nombre_bibliotecario'],
            'anio_puesto' => $params['anio_puesto'],
            'biblioteca_id' => $params['biblioteca_id']
        ]);

        return 'Registro actualizado';
    }

    public function destroy($id)
    {
        Bibliotecario::find($id)->delete();

        return 'Registro eliminado';
    }
}

