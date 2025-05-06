<?php

namespace App\Http\Controllers;

use App\Models\Lector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LectorController extends Controller
{
    public function index()
    {
        return response()->json(Lector::all(), 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email|unique:lectors,email',
            'direccion' => 'required|string',
            'telefono' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $lector = Lector::create($request->all());
        return response()->json($lector, 201);
    }

    public function show($id)
    {
        $lector = Lector::find($id);
        if (!$lector) {
            return response()->json(['message' => 'Lector no encontrado'], 404);
        }

        return response()->json($lector, 200);
    }

    public function update(Request $request, $id)
    {
        $lector = Lector::find($id);
        if (!$lector) {
            return response()->json(['message' => 'Lector no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|required|string',
            'apellido' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:lectors,email,' . $id,
            'direccion' => 'sometimes|required|string',
            'telefono' => 'sometimes|required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $lector->update($request->all());
        return response()->json($lector, 200);
    }

    public function destroy($id)
    {
        $lector = Lector::find($id);
        if (!$lector) {
            return response()->json(['message' => 'Lector no encontrado'], 404);
        }

        $lector->delete();
        return response()->json(['message' => 'Lector eliminado'], 200);
    }
}
