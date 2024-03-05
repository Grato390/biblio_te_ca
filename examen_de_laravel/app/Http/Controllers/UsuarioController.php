
<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->all();
        $usuario = Usuario::create([
            'nombre' => $params['nombre'],
            'codigo_estudiante' => $params['codigo_estudiante'],
            'bibliotecario_id' => $params['bibliotecario_id']
        ]);

        return $usuario;
    }

    public function index(Request $request)
    {
        $params = $request->all();
        $size = isset($params['size']) ? $params['size'] : 5;

        $usuarios = Usuario::select('id', 'nombre', 'bibliotecario_id')
            ->with('bibliotecario')->where('bibliotecario_id', $params['bibliotecario_id'])
            ->limit($size)->get();

        return $usuarios;
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);

        return $usuario;
    }

    public function update($id, Request $request)
    {
        $params = $request->all();
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return 'Usuario no encontrado';
        }

        $usuario->update([
            'nombre' => $params['nombre'],
            'codigo_estudiante' => $params['codigo_estudiante'],
            'bibliotecario_id' => $params['bibliotecario_id']
        ]);

        return 'Registro actualizado';
    }



    public function destroy($id)
    {
        Usuario::find($id)->delete();

        return 'Registro eliminado';
    }
}
