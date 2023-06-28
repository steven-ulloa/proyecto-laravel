<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Ciudades;
use App\Models\Provincias;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Response;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function index(Request $request)
     {
         $texto = trim($request->get('texto'));
         $texto = $request->input('texto');
         $users = User::select('id', 'name', 'email', 'cedula', 'username', 'apellido', 'foto')
             ->where('name', 'like', '%' . $texto . '%')
             ->orWhere('cedula', 'like', '%' . $texto . '%')
             ->orWhere('username', 'like', '%' . $texto . '%')
             ->orderBy('name', 'asc')
             ->paginate(1000);
             // aqui va la provincia
             $provincias['data'] = Provincias::orderBy("nombre", "asc")
            ->select("id", "nombre")
            ->get();
            //

         // Transformar los datos a JSON utilizando json_encode()
         $usersJson = json_encode($users);
         // Pasar los datos a la vista y devolver la vista
         return view('user.index', compact('usersJson', 'texto'))->with("provincias", $provincias);
     }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provincias['data'] = Provincias::orderBy("nombre", "asc")
            ->select("id", "nombre")
            ->get();
        return view('user.create')->with("provincias", $provincias);
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(StoreUserRequest $request)
{
    $datosUser = $request->except('_token');
    $datosUser['password'] = Hash::make($request->input('password'));
    $hobbiesSeleccionados = $request->input('hobbies');
    $hobbiesGuardados = implode(',', $hobbiesSeleccionados);
    $datosUser['hobbies'] = $hobbiesGuardados;

    if ($request->hasFile('foto')) {
        $datosUser['foto'] = $request->file('foto')->store('uploads', 'public');
    }
    User::insert($datosUser);
    // Crear una respuesta JSON con el mensaje de éxito
    $response = [
        'message' => 'User creado correctamente'
    ];

    // Mostrar los datos JSON codificados utilizando dd()
    //dd(json_encode($response));
    // Redireccionar a una ruta y enviar los datos JSON como parámetro
    return redirect()->route('user')->with('jsonData', json_encode($response)); //aqui cambie
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        // dd($user);
        $provincias['data'] = Provincias::orderBy("nombre", "asc")
            ->select("id", "nombre")
            ->get();
        // Recuperar datos de ciudades para la provincia seleccionada por el usuario
        $provinciaId = $user->provincia_id; // Asumiendo que el modelo User tiene un campo "provincia_id" que almacena el ID de la provincia seleccionada
        $ciudades['data'] = Ciudades::orderBy("nombre_ciudad", "asc")
            ->select("id", "nombre_ciudad")
            ->where('provincia_id', $provinciaId)
            ->get();
        return view('user.show', compact('user', 'provincias', 'ciudades'));
    }

    // public function edit(Request $request, $id)
    //     {
    //         $user = User::findOrFail($id);
    //         $provincias['data'] = Provincias::orderBy("nombre", "asc")
    //             ->select("id", "nombre")
    //             ->get();
    //         $provinciaId = $user->provincia_id;
    //         $ciudades['data'] = Ciudades::orderBy("nombre_ciudad", "asc")
    //             ->select("id", "nombre_ciudad")
    //             ->where('provincia_id', $provinciaId)
    //             ->get();

    //         $data = [
    //             'user' => $user,
    //             'provincias' => $provincias,
    //             'ciudades' => $ciudades
    //         ];

    //         $jsonData = json_encode($data);
    //         // echo($jsonData);
    //         return view('user.edit', compact('user', 'jsonData','provincias', 'ciudades'));
    //     }

    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $provincias['data'] = Provincias::orderBy("nombre", "asc")
                   ->select("id", "nombre")
                   ->get();
        $provinciaId = $user->provincia_id;
        $ciudades['data'] = Ciudades::orderBy("nombre_ciudad", "asc")
                ->select("id", "nombre_ciudad")
                ->where('provincia_id', $provinciaId)
                ->get();

        $response = [
            'user' => $user,
            'provincias' => $provincias,
            'ciudades' => $ciudades
        ];
        return response()->json($response);
    }

    public function update(UpdateUserRequest $request)
{
    $user = User::findOrFail($request->input('user_id'));

    $user->fill($request->validated());

    $user->provincia_id = Provincias::findOrFail($request->input('provincia_id'))->id;
    $user->ciudad_id = Ciudades::findOrFail($request->input('ciudad_id'))->id;

    $hobbiesSeleccionados = $request->input('hobbies');
    $user->hobbies = implode(',', $hobbiesSeleccionados);

    if ($request->hasFile('foto')) {
        Storage::delete('public/storage/uploads' . $user->foto);
        $user->foto = $request->file('foto')->store('uploads', 'public');
    }

    $user->save();

    return redirect()->back()->with('success', 'Usuario actualizado correctamente');
}
    

    // public function update(UpdateUserRequest $request, User $user)
    // {
    //     $user->fill($request->validated());

    //      $user->provincia_id = $request->provincia_id;
    //      $user->ciudad_id = $request->ciudad_id;

    //     $user->hobbies = implode(',', $request->input('hobbies', []));

    //     if ($request->hasFile('foto')) {
    //         Storage::delete('public/storage/uploads' . $user->foto);
    //         $user->foto = $request->file('foto')->store('uploads', 'public');
    //     }
    //     $user->update();
    //     //dd($request->all());
    //     return redirect()->back()->with('success', 'Usuario actualizado correctamente');
    // }



    public function destroy(User $user)
    {
        $user->delete();
        return redirect('user')->with('success', 'Usuario eliminado correctamente');
    }



}








