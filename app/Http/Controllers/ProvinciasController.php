<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestsProvincias\StoreProvinciaRequest;
use App\Http\Requests\RequestsProvincias\UpdateProvinciaRequest;
use Illuminate\Http\Request;
use App\Models\Provincias;


class ProvinciasController extends Controller
{
    public function index(Request $request)
    {
        //buscardor
        $texto = trim($request->get('texto'));
        $provincias = Provincias::select('id', 'nombre')
            ->where('nombre', 'LIKE', '%' . $texto . '%')
            ->orWhere('id', 'LIKE', '%' . $texto . '%')
            ->orderBy('nombre', 'asc')
            ->paginate(20);
        // $provincias = Provincias::paginate(5);
        return view('provincia.index', compact('provincias', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('provincia.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProvinciaRequest $request)
    {
        $datosProvincia = request()->except('_token'); //me trae todo excepto el token
        Provincias::insert($datosProvincia);
        return redirect()->route('provincia')->with('success', 'Provincia creada correctamente');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        $provincia = Provincias::findOrFail($id);
        return view('provincia.edit', compact('provincia'));
    }

    public function update(UpdateProvinciaRequest $request, Provincias $provincia)
    {
    $provincia->nombre = $request->input('nombre');
    $provincia->save();

    return redirect()->route('provincia')->with('success', 'Provincia actualizada correctamente');
    }

    public function destroy(Provincias $provincia)
    {
        $provincia->delete();

        return redirect()->route('provincia')->with('success', 'Provincia eliminada correctamente');
    }
}
