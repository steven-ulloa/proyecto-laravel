<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
                        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
                        crossorigin="anonymous">

                    {{-- modal --}}
                    <!-- Modal insertar-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">REGISTRO DE USUARIO</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="myForm_insert" action="{{ route('user.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <!-- Name -->
                                        <div class="form-group">
                                            <x-input-label for="name" :value="__('Name')" />
                                            <x-text-input id="name" class="block mt-1 w-full" type="text"
                                                name="name"
                                                value="{{ isset($user->name) ? $user->name : old('name') }}"
                                                id="" autofocus autocomplete="name" />
                                            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                                            {{-- <x-input-error-registro :messages="$errors->get('name')" class="mt-2" /> --}}
                                            @error('name')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Email Address -->
                                        <div class="form-group">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="block mt-1 w-full" type="text"
                                                name="email"
                                                value="{{ isset($user->email) ? $user->email : old('email') }}"
                                                autocomplete="email" />
                                            <x-input-error-registro :messages="$errors->get('email')" class="mt-2" />
                                            @error('email')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                                        </div>

                                        <!-- Password -->
                                        <div class="form-group">
                                            <x-input-label for="password" :value="__('Password')" />
                                            <x-text-input id="password" class="block mt-1 w-full" type="password"
                                                value="{{ isset($user->password) ? $user->password : old('password') }}"
                                                name="password" autocomplete="new-password" />
                                            @error('password')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
                                        </div>
                                        <!-- cedula -->
                                        <div class="form-group">
                                            <x-input-label for="cedula" :value="__('Cedula')" />
                                            <x-text-input id="cedula" class="block mt-1 w-full" type="number"
                                                name="cedula"
                                                value="{{ isset($user->cedula) ? $user->cedula : old('cedula') }}"
                                                autofocus autocomplete="cedula" />
                                            @error('cedula')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                            {{-- <x-input-error :messages="$errors->get('cedula')" class="mt-2" /> --}}
                                        </div>
                                        <!-- username -->
                                        <div class="form-group">
                                            <x-input-label for="username" :value="__('Username')" />
                                            <x-text-input id="username" class="block mt-1 w-full" type="text"
                                                name="username"
                                                value="{{ isset($user->username) ? $user->username : old('username') }}"
                                                autofocus autocomplete="username" />
                                            @error('username')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                            {{-- <x-input-error :messages="$errors->get('username')" class="mt-2" /> --}}
                                        </div>
                                        <!-- apellido -->
                                        <div class="form-group">
                                            <x-input-label for="apellido" :value="__('Apellido')" />
                                            <x-text-input id="apellido" class="block mt-1 w-full" type="text"
                                                name="apellido"
                                                value="{{ isset($user->apellido) ? $user->apellido : old('apellido') }}"
                                                autofocus autocomplete="apellido" />
                                            @error('apellido')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                            {{-- <x-input-error :messages="$errors->get('apellido')" class="mt-2" /> --}}
                                        </div>
                                        <!-- fecha -->
                                        <div class="form-group">
                                            <x-input-label for="fecha" :value="__('Fecha de nacimiento')" />
                                            <x-text-input id="fecha" class="block mt-1 w-full" type="date"
                                                name="fecha"
                                                value="{{ isset($user->fecha) ? calculateAge($user->fecha) : old('edad') }}"
                                                autofocus autocomplete="edad" />
                                            @error('fecha')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                            {{-- <x-input-error :messages="$errors->get('fecha')" class="mt-2" /> --}}
                                        </div>
                                        <!-- edad -->
                                        <div class="form-group">
                                            <x-input-label for="edad" :value="__('Edad')" />
                                            <x-text-input id="edad" class="block mt-1 w-full" type="number"
                                                name="edad"
                                                value="{{ isset($user->edad) ? $user->edad : old('edad') }}" autofocus
                                                autocomplete="edad" />
                                            @error('edad')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                            {{-- <x-input-error :messages="$errors->get('edad')" class="mt-2" /> --}}
                                        </div>

                                        <!-- Provincia -->
                                        <div class="form-group">
                                            <x-input-label for="provincia" :value="__('Provincia')" />
                                            <select id="sel_provincia" name="provincia_id">
                                                {{-- //aqui van cambios --}}
                                                <option value="">---seleccione una provincia</option>
                                                {{-- leer los departamentos --}}
                                                @foreach ($provincias['data'] as $provincia)
                                                    <option value='{{ $provincia->id }}'>{{ $provincia->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('provincia_id')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                            {{-- <x-input-error :messages="$errors->get('provincia')" class="mt-2" /> --}}
                                        </div>

                                        <!-- Ciudad -->
                                        <div class="form-group">
                                            <x-input-label for="ciudad" :value="__('Ciudad')" />
                                            <select id="sel_ciudades" name="ciudad_id">
                                                <option value=" ">--selecciona la cuidad--</option>
                                            </select>
                                            @error('ciudad_id')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                            {{-- <x-input-error :messages="$errors->get('ciudad')" class="mt-2" /> --}}
                                        </div>

                                        <!-- direccion -->
                                        <div class="form-group">
                                            <x-input-label for="direccion" :value="__('Dirección')" />
                                            <x-text-input id="direccion" class="block mt-1 w-full" type="text"
                                                name="direccion"
                                                value="{{ isset($user->direccion) ? $user->direccion : old('direccion') }}"
                                                autofocus autocomplete="direccion" />
                                            @error('direccion')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                            {{-- <x-input-error :messages="$errors->get('direccion')" class="mt-2" /> --}}
                                        </div>

                                        <!-- Genero -->
                                        <div class="form-group">
                                            <x-input-label for="genero"
                                                value="{{ isset($user->genero) ? $user->genero : '' }}" /> Genero
                                            <br>

                                            <input type="radio" id="masculino" name="genero" value="masculino"
                                                {{ isset($user) && $user->genero === 'masculino' ? 'checked' : '' }}>
                                            <label for="masculino">Masculino</label>
                                            <br>
                                            <input type="radio" id="femenino" name="genero" value="femenino"
                                                {{ isset($user) && $user->genero === 'femenino' ? 'checked' : '' }}>
                                            <label for="femenino">Femenino</label>
                                            <br>
                                            @error('genero')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                            {{-- <x-input-error :messages="$errors->get('genero')" class="mt-2" /> --}}
                                        </div>

                                        <!-- estado civil -->
                                        <div class="form-group">
                                            <x-input-label for="estado_civil" /> estado civil <br>
                                            <select id="estado_civil"
                                                value="{{ isset($user->estado_civil) ? $user->estdo_civil : '' }}"
                                                name="estado_civil">
                                                <option
                                                    value="soltero"{{ isset($user->estado_civil) && $user->estado_civil == 'soltero' ? 'selected' : '' }}>
                                                    Soltero</option>
                                                <option value="casado"
                                                    {{ isset($user->estado_civil) && $user->estado_civil == 'casado' ? 'selected' : '' }}>
                                                    Casado
                                                </option>
                                                <option value="viudo"
                                                    {{ isset($user->estado_civil) && $user->estado_civil == 'viudo' ? 'selected' : '' }}>
                                                    Viudo
                                                </option>
                                                <option value="divorciado"
                                                    {{ isset($user->estado_civil) && $user->estado_civil == 'divorciado' ? 'selected' : '' }}>
                                                    Divorciado</option>
                                                <option value="union-Libre"
                                                    {{ isset($user->estado_civil) && $user->estado_civil == 'union-Libre' ? 'selected' : '' }}>
                                                    Unión libre</option>
                                            </select>
                                            <br>
                                            @error('estado_civil')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                            {{-- <x-input-error :messages="$errors->get('estdo_civil')" class="mt-2" /> --}}
                                        </div>

                                        <!-- hobbies -->
                                        <div class="form-group">
                                            <x-input-label for="hobbies" :value="__('Hobbies')" />
                                            <select id="hobbies" name="hobbies[]" multiple>
                                                <option value="futbol"
                                                    {{ isset($user->hobbies) && $user->hobbies == 'futbol' ? 'selected' : '' }}>
                                                    Jugar fútbol
                                                </option>
                                                <option value="leer"
                                                    {{ isset($user->hobbies) && $user->hobbies == 'leer' ? 'selected' : '' }}>
                                                    Leer</option>
                                                <option value="escuchar-musica"
                                                    {{ isset($user->hobbies) && $user->hobbies == 'escuchar-musica' ? 'selected' : '' }}>
                                                    Escuchar
                                                    música</option>
                                                <option value="viajar"
                                                    {{ isset($user->hobbies) && $user->hobbies == 'viajar' ? 'selected' : '' }}>
                                                    Viajar</option>
                                                <option value="cocinar"
                                                    {{ isset($user->hobbies) && $user->hobbies == 'cocinar' ? 'selected' : '' }}>
                                                    Cocinar
                                                </option>
                                            </select>
                                            <br>
                                            @error('hobbies')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                            {{-- <x-input-error :messages="$errors->get('hobbies')" class="mt-2" /> --}}
                                        </div>

                                        <!-- foto -->
                                        <div class="form-group">
                                            <x-input-label for="foto"
                                                value="{{ isset($user->foto) ? $user->foto : old('foto') }}"
                                                :value="__('Foto')" />
                                            @if (@isset($user->foto))
                                                <img src="{{ asset('storage') . '/' . $user->foto }}" width="100"
                                                    alt="">
                                            @endif
                                            <input type="file" id="foto" name="foto" accept="image/*">
                                            <br>
                                            @if (isset($user->foto))
                                                <p>URL de la imagen guardada:
                                                    {{ asset('storage') . '/' . $user->foto }}</p>
                                            @endif
                                            @error('foto')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                            {{-- <x-input-error :messages="$errors->get('foto')" class="mt-2" /> --}}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        {{-- <x-primary-button>
                                                <input id="submitBtn" class="btn btn-success" type="submit" value="Guardar">
                                            </x-primary-button> --}}
                                        <button type="submit" class="btn btn-success">Guardar cambios</button>
                                    </div>
                                </form>

                                <body>

                                    <body>
                                        {{-- libreria jquery --}}
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                                        <script type='text/javascript'>
                                            let route = "{{ route('getCiudades', ':provinciaId') }}";

                                            $('#sel_provincia').change(function() {
                                                var id = $(this).val();

                                                // vacio el dropdown
                                                console.log(id);
                                                $('#sel_ciudades').find("option").not(":first").remove(); //remuevo

                                                //AJAX PARA EL TOKEN
                                                $.ajaxSetup({
                                                    headers: {
                                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                    }
                                                });
                                                console.log("antes del ajax");

                                                //AJAX
                                                $.ajax({
                                                    type: 'GET',
                                                    url: route,
                                                    data: {
                                                        'provinciaId': id
                                                    },
                                                    dataType: "json",
                                                    success: function(response) {
                                                        console.log('antes de ');
                                                        console.log(response);
                                                        var len = 0;
                                                        console.log(response['ciudadData']);
                                                        if (response['ciudadData'] != null) {

                                                            len = response['ciudadData'].length;
                                                        }
                                                        if (len > 0) {
                                                            for (var i = 0; i < len; i++) {
                                                                var id = response.ciudadData[i].id;
                                                                var nombre_ciudad = response.ciudadData[i].nombre_ciudad;
                                                                console.log('Ciudad ID:',
                                                                    id); // Verifica el valor de ciudadId en la consola
                                                                console.log('Nombre Ciudad:',
                                                                    nombre_ciudad); // Verifica el valor de nombreCiudad en la consola
                                                                var option = "<option value='" + id + "'>" + nombre_ciudad + "</option>";
                                                                $("#sel_ciudades").append(option);
                                                            }
                                                        }

                                                    }
                                                });
                                            });
                                            // Empty the dropdown
                                        </script>
                                    </body>
                            </div>
                        </div>
                    </div>
                    <!-- Modal insertar fin-->



                    {{-- editar modal --}}
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">EDITAR Y ACTUALIZAR USER</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="myForm" action="{{ url('actualizar') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')


                                    <input type="hidden" id="user_id" name="user_id" value=""/>

                                    <div class="modal-body">
                                        <!-- Name -->
                                        <div class="form-group">
                                            <x-input-label for="name" :value="__('Name')" />
                                            <x-text-input id="name" class="block mt-1 w-full" type="text"
                                                name="name" autofocus autocomplete="name" />
                                            @error('name')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        <!-- Email -->
                                        <div class="form-group">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="correo" class="block mt-1 w-full" type="text"
                                                name="email" autocomplete="email" />
                                            @error('email')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Password -->
                                        <div class="form-group">
                                            <x-input-label for="password" :value="__('Password')" />
                                            <x-text-input id="contrasena" class="block mt-1 w-full" type="password"
                                                name="password" autocomplete="new-password" />
                                            @error('password')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                        <!-- cedula -->
                                        <div class="form-group">
                                            <x-input-label for="cedula" :value="__('Cedula')" />
                                            <x-text-input id="ci" class="block mt-1 w-full" type="number"
                                                name="cedula" />
                                            @error('cedula')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <!-- username -->
                                        <div class="form-group">
                                            <x-input-label for="username" :value="__('Username')" />
                                            <x-text-input id="nickname" class="block mt-1 w-full" type="text"
                                                name="username" autofocus autocomplete="username" />
                                            @error('username')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                        <!-- apellido -->
                                        <div class="form-group">
                                            <x-input-label for="apellido" :value="__('Apellido')" />
                                            <x-text-input id="apellido-user" class="block mt-1 w-full" type="text"
                                                name="apellido"
                                                value="{{ isset($user->apellido) ? $user->apellido : old('apellido') }}"
                                                autofocus autocomplete="apellido" />
                                            @error('apellido')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <!-- fecha -->
                                        <div class="form-group">
                                            <x-input-label for="fecha" :value="__('Fecha de nacimiento')" />
                                            <x-text-input id="fecha-nac" class="block mt-1 w-full" type="date"
                                                name="fecha"
                                                value="{{ isset($user->fecha) ? calculateAge($user->fecha) : old('edad') }}"
                                                autofocus autocomplete="edad" />
                                            @error('fecha')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <!-- edad -->
                                        <div class="form-group">
                                            <x-input-label for="edad" :value="__('Edad')" />
                                            <x-text-input id="edad-user" class="block mt-1 w-full" type="number"
                                                name="edad"
                                                value="{{ isset($user->edad) ? $user->edad : old('edad') }}" autofocus
                                                autocomplete="edad" />
                                            @error('edad')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Provincia -->
                                        <div class="form-group">
                                            <x-input-label for="provincia" :value="__('Provincia')" />
                                            <select id="sel_provincias_edit" name="provincia_id">
                                                {{-- //aqui van cambios --}}
                                                <option value="">---seleccione una provincia</option>
                                                {{-- leer los departamentos --}}
                                                @foreach ($provincias['data'] as $provincia)
                                                    <option value='{{ $provincia->id }}'>{{ $provincia->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('provincia_id')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Ciudad -->
                                        <div class="form-group">
                                            <x-input-label for="ciudad" :value="__('Ciudad')" />
                                            <select id="sel_ciudades_editar" name="ciudad_id">
                                                <option value=" ">--selecciona la cuidad--</option>
                                                @if (isset($ciudades) && isset($ciudades['data']))
                                                    @foreach ($ciudades['data'] as $ciudad)
                                                        <option value="{{ $ciudad->id }}"
                                                            {{ isset($user->ciudad_id) && $user->ciudad_id == $ciudad->id ? 'selected' : '' }}>
                                                            {{ $ciudad->nombre_ciudad }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('ciudad')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- direccion -->
                                        <div class="form-group">
                                            <x-input-label for="direccion" :value="__('Dirección')" />
                                            <x-text-input id="direcciones" class="block mt-1 w-full" type="text"
                                                name="direccion"
                                                value="{{ isset($user->direccion) ? $user->direccion : old('direccion') }}"
                                                autofocus autocomplete="direccion" />
                                            @error('direccion')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        <!-- Genero -->
                                        <div class="form-group">
                                            <x-input-label for="genero"
                                                value="{{ isset($user->genero) ? $user->genero : '' }}" />
                                            Genero
                                            <br>
                                            <input type="radio" id="masculino_select" name="genero"
                                                value="masculino"
                                                {{ isset($user) && $user->genero === 'masculino' ? 'checked' : '' }}>
                                            <label for="masculino">Masculino</label>
                                            <br>
                                            <input type="radio" id="femenino_select" name="genero"
                                                value="femenino"
                                                {{ isset($user) && $user->genero === 'femenino' ? 'checked' : '' }}>
                                            <label for="femenino">Femenino</label>
                                            <br>
                                            @error('genero')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- estado civil -->
                                        <div class="form-group">
                                            <x-input-label for="estado_civil" /> estado civil <br>
                                            <select id="estado_civil_select"
                                                value="{{ isset($user->estado_civil) ? $user->estdo_civil : '' }}"
                                                name="estado_civil">
                                                <option
                                                    value="soltero"{{ isset($user->estado_civil) && $user->estado_civil == 'soltero' ? 'selected' : '' }}>
                                                    Soltero</option>
                                                <option value="casado"
                                                    {{ isset($user->estado_civil) && $user->estado_civil == 'casado' ? 'selected' : '' }}>
                                                    Casado
                                                </option>
                                                <option value="viudo"
                                                    {{ isset($user->estado_civil) && $user->estado_civil == 'viudo' ? 'selected' : '' }}>
                                                    Viudo
                                                </option>
                                                <option value="divorciado"
                                                    {{ isset($user->estado_civil) && $user->estado_civil == 'divorciado' ? 'selected' : '' }}>
                                                    Divorciado</option>
                                                <option value="union-Libre"
                                                    {{ isset($user->estado_civil) && $user->estado_civil == 'union-Libre' ? 'selected' : '' }}>
                                                    Unión libre</option>
                                            </select>
                                            <br>
                                            @error('estado_civil')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- hobbies -->
                                        <div class="form-group">
                                            <x-input-label for="hobbies" :value="__('Hobbies')" />
                                            <select id="hobbies_select" name="hobbies[]" multiple>
                                                <option value="futbol"
                                                    {{ isset($user->hobbies) && $user->hobbies == 'futbol' ? 'selected' : '' }}>
                                                    Jugar fútbol
                                                </option>
                                                <option value="leer"
                                                    {{ isset($user->hobbies) && $user->hobbies == 'leer' ? 'selected' : '' }}>
                                                    Leer</option>
                                                <option value="escuchar-musica"
                                                    {{ isset($user->hobbies) && $user->hobbies == 'escuchar-musica' ? 'selected' : '' }}>
                                                    Escuchar
                                                    música</option>
                                                <option value="viajar"
                                                    {{ isset($user->hobbies) && $user->hobbies == 'viajar' ? 'selected' : '' }}>
                                                    Viajar</option>
                                                <option value="cocinar"
                                                    {{ isset($user->hobbies) && $user->hobbies == 'cocinar' ? 'selected' : '' }}>
                                                    Cocinar
                                                </option>
                                            </select>
                                            <br>
                                            @error('hobbies')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- foto -->
                                        <div class="form-group">
                                            <x-input-label for="foto"
                                                value="{{ isset($user->foto) ? $user->foto : old('foto') }}"
                                                :value="__('Foto')" />
                                            @if (@isset($user->foto))
                                                <img src="{{ asset('storage') . '/' . $user->foto }}" width="100"
                                                    alt="">
                                            @endif
                                            <div id="imagen-preview"></div>
                                            <input type="file" id="imagen" name="foto" accept="image/*">
                                            <br>
                                            @error('foto')
                                                <div class="alert alert-danger" style="color: red;">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-success btn-submit actualizarBtn"
                                            id="actulizarBtn" >Actualizar</button>
                                    </div>

                                </form>

                                <body>
                                    {{-- libreria jquery --}}
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                                    <script type='text/javascript'>
                                        // Elimina la línea de declaración de la variable "route" si ya la has declarado antes
                                        let ruta = "{{ route('getCiudades', ':provinciaId') }}";
                                        $('#sel_provincias_edit').change(function() {
                                            var id = $(this).val();

                                            // Vacía el dropdown
                                            console.log(id);
                                            $('#sel_ciudades_editar').find("option").not(":first").remove();

                                            // AJAX PARA EL TOKEN
                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                }
                                            });
                                            console.log("antes del ajax");

                                            // AJAX
                                            $.ajax({
                                                type: 'GET',
                                                url: "/ciudad/" + id,
                                                data: {
                                                    'provinciaId': id
                                                },
                                                dataType: "json",
                                                success: function(response) {
                                                    console.log('antes de ');
                                                    console.log(response);
                                                    var len = 0;
                                                    console.log(response['ciudadData']);
                                                    if (response['ciudadData'] != null) {
                                                        len = response['ciudadData'].length;
                                                    }
                                                    if (len > 0) {
                                                        for (var i = 0; i < len; i++) {
                                                            var id = response.ciudadData[i].id;
                                                            var nombre_ciudad = response.ciudadData[i].nombre_ciudad;
                                                            console.log('Ciudad ID:', id);
                                                            console.log('Nombre Ciudad:', nombre_ciudad);
                                                            var option = "<option value='" + id + "'>" + nombre_ciudad + "</option>";
                                                            $("#sel_ciudades_editar").append(option);
                                                        }
                                                    }
                                                }
                                            });
                                        });
                                        // Empty the dropdown
                                    </script>
                                </body>

                            </div>
                        </div>
                    </div>
                    {{-- final del edit modal --}}

                    <div id="users-container" class="text-center">
                        <h1>lista de users</h1>
                    </div>
                    <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">registrar Modal</a>
                    <a class="btn btn-info " href="{{ url('user/create') }}">registrar usuario</a>
                    <div class="col-xl-12">
                        <form action="{{ route('user') }}" method="get">
                            <div class="form-row">
                                <div class="col-sm-4 mt-5 ">
                                    <input type="text" class="form-control my-input" name="texto"
                                        value="{{ $texto }}">
                                </div>
                                <div class="col-auto mt-1">
                                    <input type="submit" class="btn btn-primary my-btn" value="Buscar">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="responsive py-12 ">
                        <table class="table table-light table-bordered table-striped">
                            <thead class="thead-light p-3 mb-2 ">
                                <tr>
                                    <th>Id</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>cedula</th>
                                    <th>username</th>
                                    <th>apellido</th>
                                    <th>foto</th>
                                    <th>acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $users = json_decode($usersJson);
                                    //echo($usersJson);
                                @endphp
                                @foreach ($users->data as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->cedula }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->apellido }}</td>
                                        {{-- ESTO DE AQUI ES PARA GUARDAR LA IMAGEN EN EL STORAGE --}}
                                        <td> <img src="{{ asset('storage') . '/' . $user->foto }} " width="100"
                                                alt=""></td>
                                        {{-- ESTO DE AQUI ES PARA CREAR EL BOTON EDITAR --}}
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-info mx-1 openModalButton" id="openModalButton"
                                                    href="{{ url('/user/' . $user->id . '/edit') }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-clipboard-minus-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z" />
                                                        <path
                                                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1ZM6 9h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1Z" />
                                                    </svg>
                                                </a>
                                                {{-- ESTE ES EL BOTON EDITAR QUE VA A TIRAR EL MODAL con el id --}}
                                                <button type="button" value="{{ $user->id }}"
                                                    class="btn btn-primary editbtn btn-sm">edit</button>
                                                {{-- AQUI TERMINA --}}
                                                {{-- boton mostrar --}}
                                                 <a class="btn btn-info mx-1 "
                                                    href="{{ url('/user/' . $user->id . '/show') }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-eye"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                    </svg>
                                                </a>
                                                {{-- aqui termina el boton mostrar --}}
                                                <!-- Botón de Eliminar -->
                                                <form id="deleteForm" action="{{ url('/user/' . $user->id) }}"
                                                    method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="button" class="btn btn-danger mx-1"
                                                        data-toggle="modal" data-target="#confirmModal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-trash3"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                        </svg>
                                                    </button>
                                                </form>

                                                <!-- Modal de Confirmación de Eliminación -->
                                                <div class="modal fade" id="confirmModal" tabindex="-1"
                                                    role="dialog" aria-labelledby="confirmModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="confirmModalLabel">
                                                                    Confirmar eliminación</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>¿Estás seguro de que deseas eliminar el registro?</p>
                                                                <p>Nombre: {{ $user->name }}</p>
                                                                <p>Cédula: {{ $user->cedula }}</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancelar</button>
                                                                <form action="{{ url('/user/' . $user->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    {{ method_field('DELETE') }}
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Eliminar</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {{-- esto es para la paginacion --}}
                        {{-- <div class="d-flex justify-content-end">
                            {{ $users->links() }}
                        </div> --}}
                        {{-- aqui termina la paginacion --}}

                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- recargar pagina entera por ajax --}}
    <script>
        $(document).ready(function() {
    // Función para recargar la página mediante AJAX
    function reloadPage() {
        $.ajax({
            url: window.location.href,
            method: 'GET',
            success: function(response) {
                $('html').html($(response).find('html').html());
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Manejar el evento de recargar página
    $('#reload-button').click(function(event) {
        event.preventDefault();
        reloadPage();
    });
});

    </script>
    {{-- // aqui termina --}}
    {{-- recargar la tabla por ajax --}}
<script>
    $(document).ready(function() {
    // Función para cargar el contenido de la tabla mediante AJAX
    function loadUsers() {
        $.ajax({
            url: window.location.href,
            method: 'GET',
            success: function(response) {
                var usersContainer = $('#users-container');
                usersContainer.html($(response).find('#users-container').html());
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Manejar el envío del formulario de búsqueda mediante AJAX
    $('#search-form').submit(function(event) {
        event.preventDefault();
        loadUsers();
    });

    // Cargar el contenido inicial de la tabla al cargar la página
    loadUsers();
});

</script>


    {{-- recargar la tabla por ajax final --}}



    {{-- trae los datos del regisro --}}
    <script>
        $(document).ready(function() {
            $(document).on('click', '.editbtn', function() {
                var user_id = $(this).val();
                //alert(user_id);
                var provincia_id;
                $('#editModal').modal('show');
                // Obtener el user_id del atributo de datos en el botón
                var userId = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "/user/" + user_id,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        document.getElementById('user_id').value = response.user.id;
                        //console.log(response.user['id']);
                        //console.log(response.user.id);
                        document.getElementById('name').value = response.user.name;
                        document.getElementById('correo').value = response.user.email;
                        document.getElementById('contrasena').value = response.user.password;
                        document.getElementById('ci').value = response.user.cedula;
                        document.getElementById('nickname').value = response.user.username;
                        document.getElementById('apellido-user').value = response.user.apellido;
                        document.getElementById('edad-user').value = response.user.edad;
                        document.getElementById('fecha-nac').value = response.user.fecha;
                        document.getElementById('sel_provincias_edit').value = response.user
                            .provincia_id;
                        document.getElementById('sel_ciudades_editar').value = response.user
                            .ciudad_id;

                        document.getElementById('direcciones').value = response.user.direccion;
                        provincia_id = response.user.provincia_id;

                        // Marcar la opción del género guardada
                        if (response.user.genero === 'masculino') {
                            $('#masculino_select').prop('checked', true);
                        } else if (response.user.genero === 'femenino') {
                            $('#femenino_select').prop('checked', true);
                        }

                        document.getElementById('estado_civil_select').value = response.user
                            .estado_civil;

                        // Obtener los hobbies marcados
                        // Obtener los hobbies seleccionados como una cadena separada por comas
                        var hobbies = response.user.hobbies;
                        // Convertir la cadena de hobbies en un array
                        var hobbiesArray = hobbies.split(',');

                        // Seleccionar las opciones correspondientes en el campo de hobbies
                        var hobbiesSelect = document.getElementById('hobbies_select');
                        for (var i = 0; i < hobbiesSelect.options.length; i++) {
                            if (hobbiesArray.includes(hobbiesSelect.options[i].value)) {
                                hobbiesSelect.options[i].selected = true;
                            } else {
                                hobbiesSelect.options[i].selected = false;
                            }
                        }
                        // Mostrar la imagen guardada
                        var imagenGuardadaUrl = response.user.foto;
                        if (imagenGuardadaUrl) {
                            var imagenGuardada = new Image();
                            imagenGuardada.src = "{{ asset('storage') }}/" +
                                imagenGuardadaUrl;
                            imagenGuardada.width = 100;

                            imagenGuardada.onload = function() {
                                var imagenPreview = document.getElementById(
                                    'imagen-preview');
                                imagenPreview.innerHTML = '';
                                imagenPreview.appendChild(imagenGuardada);
                            };
                        }
                        // Obtener las ciudades de la provincia seleccionada
                        $.ajax({
                            type: 'GET',
                            url: "/ciudad/" + provincia_id,
                            data: {
                                'provinciaId': provincia_id,
                            },
                            dataType: "json",
                            success: function(response) {
                                $("#sel_ciudades_editar").empty();
                                var len = 0;
                                if (response['ciudadData'] != null) {
                                    len = response['ciudadData'].length;
                                }
                                if (len > 0) {
                                    for (var i = 0; i < len; i++) {
                                        var id = response.ciudadData[i].id;
                                        var nombre_ciudad = response.ciudadData[i]
                                            .nombre_ciudad;
                                        var option = "<option value='" + id + "'>" +
                                            nombre_ciudad + "</option>";
                                        $("#sel_ciudades_editar").append(option);
                                    }
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
    {{-- aqui termina trae los datos del regisro --}}
    {{-- ajax de prueba para eliminar --}}
    <script>
        $(document).ready(function() {
            $('#confirmDelete').click(function() {
                $.ajax({
                    url: $('#deleteForm').attr('action'),
                    type: 'POST',
                    data: $('#deleteForm').serialize(),
                    success: function(response) {
                        // La eliminación fue exitosa
                        // Aquí puedes realizar cualquier acción adicional, como actualizar la lista de registros
                        $('#confirmModal').modal('hide'); // Oculta el modal de confirmación
                    },
                    error: function(xhr, status, error) {
                        // Ocurrió un error durante la eliminación
                        // Puedes manejar el error aquí, por ejemplo, mostrar un mensaje de error
                    }
                });
            });
        });
    </script>
    {{-- aqui termina el eliminar --}}

</x-app-layout>
