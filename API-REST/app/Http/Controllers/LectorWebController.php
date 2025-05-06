<?php

namespace App\Http\Controllers;

use App\Models\Lector;
use Illuminate\Http\Request;

class LectorWebController extends Controller
{
    public function index()
    {
        $lectores = Lector::all();
        return view('lectores.index', compact('lectores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email|unique:lectors,email',
            'direccion' => 'required|string',
            'telefono' => 'required|string'
        ]);

        Lector::create($request->all());
        return redirect()->route('lectores.index');
    }

    public function edit(Lector $lector)
    {
        $lectores = Lector::all();
        return view('lectores.index', compact('lector', 'lectores'));
    }

    public function update(Request $request, Lector $lector)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email|unique:lectors,email,' . $lector->id,
            'direccion' => 'required|string',
            'telefono' => 'required|string'
        ]);

        $lector->update($request->all());
        return redirect()->route('lectores.index');
    }

    public function destroy(Lector $lector)
    {
        $lector->delete();
        return redirect()->route('lectores.index');
    }
}
