<?php

namespace App\Http\Controllers;
use App\Models\Ciudades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CiudadesController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $ciudades=DB::table('ciudades')->select('id','nombre_ciudad','descripcion')
                                 ->where('nombre_ciudad','LIKE','%'.$texto.'%')
                                 ->orWhere('descripcion','LIKE','%'.$texto.'%')
                                 ->orWhere('id','LIKE','%'.$texto.'%')
                                 ->orderBy('id','asc')
                                 ->paginate(5);
        // $ciudades = Ciudades::paginate(5);
        return view('ciudad.index', compact('ciudades', 'texto'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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

    }

    public function update(Request $request, $id)//User $user
    {

    }

    public function destroy($id)
    {
        Ciudades::destroy($id);
        return redirect('ciudad');
    }

    //OBTIENE LAS CIUDADES NO BORRAR!!!!
    public function getCiudades(Request $request){
        $provinciaId= $request-> provinciaId; //extrae el valor del parametro provinciaId y lo asigna a la variable $provinciaId
        // Fetch ciudades by provinciaid
        $ciudadData = Ciudades::orderby("nombre_ciudad","asc") //se crea la variable ciudadData que va a tomar los valores del modelo ciudaddes y los ordena
             ->select('id','nombre_ciudad')//hace el select a la columna id y nombre ciudad
             ->where('provincia_id',$provinciaId)//condicion que recuperara las ciudades que pertenezcan a la provincia especificada por el id
             ->get();//se usa para ejecutar la consulta y devuelve los resultados
        return response()->json(["ciudadData"=> $ciudadData]);
    }

}
