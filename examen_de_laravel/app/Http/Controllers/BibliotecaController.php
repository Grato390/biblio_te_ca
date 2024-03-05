<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Universidad;

class UniversidadController extends Controller
{
    // Método para almacenar una nueva universidad en la base de datos
    public function store(Request $request)
    {
        $params = $request->all(); // Obtener todos los parámetros de la solicitud
        $universidad = Universidad::create([ // Crear una nueva instancia de Universidad en la base de datos
            'nombre' => $params['nombre'], // Asignar el nombre de la universidad
            'direccion' => $params['direccion'], // Asignar la dirección de la universidad
            'antiguedad' => $params['antiguedad'], // Asignar la antigüedad de la universidad
        ]);

        return $universidad; // Devolver la universidad recién creada
    }

    // Método para recuperar una lista de universidades basada en ciertos criterios
    public function index(Request $request)
    {
        $params = $request->all(); // Obtener todos los parámetros de la solicitud
        $size = isset($params['size']) ? $params['size'] : 5; // Obtener el tamaño de la página o establecer un valor predeterminado

        // Verificar si la clave "antiguedad" está presente en el array $params
        $antiguedad = isset($params['antiguedad']) ? $params['antiguedad'] : 0;

        // Recuperar las universidades con sus facultades asociadas que cumplen con los criterios
        $universidades = Universidad::with('facultades')
            ->where('antiguedad', '>=', $antiguedad) // Filtrar por antigüedad
            ->limit($size)->get(); // Limitar el número de resultados

        return $universidades; // Devolver la lista de universidades
    }

    // Método para mostrar los detalles de una universidad específica
    public function show($id)
    {
        $universidad = Universidad::find($id); // Encontrar una universidad por su ID

        return $universidad; // Devolver la universidad encontrada
    }

    // Método para actualizar la información de una universidad existente
    public function update($id, Request $request)
    {
        $params = $request->all(); // Obtener todos los parámetros de la solicitud
        Universidad::find($id)->update([ // Encontrar y actualizar una universidad por su ID
            'nombre' => $params['nombre'], // Actualizar el nombre de la universidad
            'direccion' => $params['direccion'], // Actualizar la dirección de la universidad
            'antiguedad' => $params['antiguedad'], // Actualizar la antigüedad de la universidad
        ]);

        return 'Registro actualizado'; // Devolver un mensaje de confirmación
    }

    // Método para eliminar una universidad de la base de datos
    public function destroy($id)
    {
        Universidad::find($id)->delete(); // Encontrar y eliminar una universidad por su ID

        return 'Registro eliminado'; // Devolver un mensaje de confirmación
    }
}
