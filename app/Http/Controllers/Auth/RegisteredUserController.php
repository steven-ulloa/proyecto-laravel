<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Provincias;
use App\Models\Ciudades;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {


        $provincias['data'] = Provincias::orderBy("nombre", "asc")
            ->select("id", "nombre")
            ->get();
        //aqui termina
        return view('auth.register')->with("provincias",$provincias);
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
     public function store(Request $request)//: RedirectResponse
    {

    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'username' => ['required', 'string', 'max:255'],
        'cedula' => ['required', 'string', 'max:255'],
        'apellido' => ['required', 'string', 'max:255'],
        'edad' => ['required', 'integer', 'max:255'],
        'fecha' => ['required', 'date'],
        'provincia_id' => ['required', 'string'],
        'ciudad_id' => ['required', 'string'],
        'direccion' => ['required', 'string'],
        'genero' => ['required', 'string'],
        'estado_civil' => ['required', 'string'],
        'foto' => ['required', 'image', 'mimes:jpeg,jpg,png,gif|max:2048'],





         ]);

         //dd($request) ;
           $user = User::create([

              'name' => $request->name,
              'email' => $request->email,
              'password' => Hash::make($request->password),
              'cedula' => $request->cedula,
              'username' => $request->username,
              'apellido' => $request->apellido,
              'edad' => $request->edad,
              'fecha' => $request->fecha,
              'provincia_id' => $request->provincia_id,
              'ciudad_id' => $request->ciudad_id,
              'direccion' => $request->direccion,
              'genero' => $request->genero,
              'estado_civil' => $request->estado_civil,
              'hobbies' => implode(', ', $request->hobbies),
             //   'hobbies' => $request->hobbies,
             // $hobbies = array($request->hobbies),
             'foto' => $request->foto,

           ]);


           if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoNombre = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public', $fotoNombre);
            $user->foto = $fotoNombre;
        }
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
