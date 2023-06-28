 @include('layouts.navigation')


<h1 class="text-center font-bold">formulario para editar users</h1>
<x-guest-layout>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDITAR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{--  --}}
                    <form id="edit-form" action="{{ route('user.update', $user->id) }}" method="post"
                        enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf
                        <!-- Name -->
                        <div class="form-group">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                value="{{ isset($user->name) ? $user->name : old('name') }}" id="" autofocus
                                autocomplete="name" />
                            @error('name')
                                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Email Address -->
                        <div class="form-group">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                                value="{{ isset($user->email) ? $user->email : old('email') }}"
                                autocomplete="username" />
                            @error('email')
                                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password"
                                value="{{ isset($user->password) ? $user->password : old('password') }}" name="password"
                                autocomplete="new-password" />
                            @error('password')
                                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- cedula -->
                        <div class="form-group">
                            <x-input-label for="cedula" :value="__('Cedula')" />
                            <x-text-input id="cedula" class="block mt-1 w-full" type="number" name="cedula"
                                value="{{ isset($user->cedula) ? $user->cedula : old('cedula') }}" autofocus
                                autocomplete="cedula" />
                            @error('cedula')
                                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- username -->
                        <div class="form-group">
                            <x-input-label for="username" :value="__('Username')" />
                            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                                value="{{ isset($user->username) ? $user->username : old('username') }}" autofocus
                                autocomplete="username" />
                            @error('username')
                                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- apellido -->
                        <div class="form-group">
                            <x-input-label for="apellido" :value="__('Apellido')" />
                            <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido"
                                value="{{ isset($user->apellido) ? $user->apellido : old('apellido') }}" autofocus
                                autocomplete="apellido" />
                            @error('apellido')
                                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- fecha -->
                        <div class="form-group">
                            <x-input-label for="fecha" :value="__('Fecha de nacimiento')" />
                            <x-text-input id="fecha" class="block mt-1 w-full" type="date" name="fecha"
                                value="{{ isset($user->fecha) ? $user->fecha : old('fecha') }}" autofocus
                                autocomplete="fecha" />
                            @error('fecha')
                                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- edad -->
                        <div class="form-group">
                            <x-input-label for="edad" :value="__('Edad')" />
                            <x-text-input id="edad" class="block mt-1 w-full" type="number" name="edad"
                                value="{{ isset($user->edad) ? $user->edad : old('edad') }}" autofocus
                                autocomplete="edad" />
                            @error('edad')
                                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Provincia -->
                        <div class="form-group">
                            <x-input-label for="provincia" :value="__('Provincia')" />
                            <select id="sel_provincia" name="provincia_id">
                                <option value="">---seleccione una provincia</option>
                                {{-- leer las provincias --}}
                                @foreach ($provincias['data'] as $provincia)
                                    <option value='{{ $provincia->id }}'
                                        {{ isset($user->provincia_id) && $user->provincia_id == $provincia->id ? 'selected' : '' }}>
                                        {{ $provincia->nombre }}</option>
                                @endforeach

                            </select>
                            @error('provincia')
                                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <x-input-label for="ciudad" :value="__('Ciudad')" />
                            <select id="sel_ciudades" name="ciudad_id">
                                <option value=" ">--selecciona la cuidad--</option>
                                     @foreach ($ciudades['data'] as $ciudad)
                                        <option value="{{ $ciudad->id }}" {{ isset($user->ciudad_id) && $user->ciudad_id == $ciudad->id ? 'selected' : '' }}>
                                        {{ $ciudad->nombre_ciudad }}
                                        </option>
                                    @endforeach
                            </select>
                            @error('ciudad')
                            <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- direccion -->
                        <div class="form-group">
                            <x-input-label for="direccion" :value="__('Dirección')" />
                            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion"
                                value="{{ isset($user->direccion) ? $user->direccion : old('direccion') }}" autofocus
                                autocomplete="direccion" />
                            @error('direccion')
                                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Genero -->
                        <div class="form-group">
                            <x-input-label for="genero" value="{{ isset($user->genero) ? $user->genero : '' }}" />
                            Genero
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
                                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                            @enderror
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
                                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- hobbies -->
                        <div class="form-group">
                            <x-input-label for="hobbies" :value="__('Hobbies')" />
                            <select id="hobbies" name="hobbies[]" multiple>
                                <option value="futbol"
                                    {{ in_array('futbol', explode(',', $user->hobbies)) ? 'selected' : '' }}>Jugar
                                    fútbol</option>
                                <option value="leer"
                                    {{ in_array('leer', explode(',', $user->hobbies)) ? 'selected' : '' }}>Leer
                                </option>
                                <option value="escuchar-musica"
                                    {{ in_array('escuchar-musica', explode(',', $user->hobbies)) ? 'selected' : '' }}>
                                    Escuchar música</option>
                                <option value="viajar"
                                    {{ in_array('viajar', explode(',', $user->hobbies)) ? 'selected' : '' }}>Viajar
                                </option>
                                <option value="cocinar"
                                    {{ in_array('cocinar', explode(',', $user->hobbies)) ? 'selected' : '' }}>Cocinar
                                </option>
                            </select>
                            <br>
                            @error('hobbies[]')
                                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- foto -->
                        <div class="form-group">
                            <x-input-label for="foto"
                                value="{{ isset($user->foto) ? $user->foto : old('foto') }}" :value="__('Foto')" />
                            @if (@isset($user->foto))
                                <img src="{{ asset('storage') . '/' . $user->foto }}" width="100" alt="">
                            @endif
                            <input type="file" id="foto" name="foto" accept="image/*">
                            <br>
                            @if (isset($user->foto))
                                <p>URL de la imagen guardada: {{ asset('storage') . '/' . $user->foto }}</p>
                            @endif
                            @error('foto')
                                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                            @enderror
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button>
                                    <input class="btn btn-success" type="submit" value="Guardar">
                                </x-primary-button>
                                <a class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                                    href="{{ url('user/') }}">regresar</a>
                            </div>
                        </div>
                    </form>
                    {{--  --}}
                </div>
            </div>
        </div>
    </div>
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
</x-guest-layout>






















{{-- <h1 class="text-center font-bold">formulario para editar users</h1>
<x-guest-layout> --}}
{{-- <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @csrf
            <!-- Name -->
            <div class="form-group">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                    value="{{ isset($user->name) ? $user->name : old('name') }}" id=""  autofocus
                    autocomplete="name" />
                    @error('name')
                    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                    @enderror
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                    value="{{ isset($user->email) ? $user->email : old('email') }}"  autocomplete="username" />
                    @error('email')
                    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                    @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password"
                    value="{{ isset($user->password) ? $user->password : old('password') }}" name="password"
                    autocomplete="new-password" />
                    @error('password')
                    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                    @enderror
            </div>

            <!-- cedula -->
            <div class="form-group">
                <x-input-label for="cedula" :value="__('Cedula')" />
                <x-text-input id="cedula" class="block mt-1 w-full" type="number" name="cedula"
                    value="{{ isset($user->cedula) ? $user->cedula : old('cedula') }}"  autofocus
                    autocomplete="cedula" />
                    @error('cedula')
                    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                    @enderror
            </div>

            <!-- username -->
            <div class="form-group">
                <x-input-label for="username" :value="__('Username')" />
                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                    value="{{ isset($user->username) ? $user->username : old('username') }}"  autofocus
                    autocomplete="username" />
                    @error('username')
                    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                    @enderror
            </div>

            <!-- apellido -->
            <div class="form-group">
                <x-input-label for="apellido" :value="__('Apellido')" />
                <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido"
                    value="{{ isset($user->apellido) ? $user->apellido : old('apellido') }}"  autofocus
                    autocomplete="apellido" />
                    @error('apellido')
                    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                    @enderror
            </div>

            <!-- fecha -->
            <div class="form-group">
                <x-input-label for="fecha" :value="__('Fecha de nacimiento')" />
                <x-text-input id="fecha" class="block mt-1 w-full" type="date" name="fecha"
                    value="{{ isset($user->fecha) ? $user->fecha : old('fecha') }}"  autofocus
                    autocomplete="fecha" />
                    @error('fecha')
                    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                    @enderror
            </div>

            <!-- edad -->
            <div class="form-group">
                <x-input-label for="edad" :value="__('Edad')" />
                <x-text-input id="edad" class="block mt-1 w-full" type="number" name="edad"
                    value="{{ isset($user->edad) ? $user->edad : old('edad') }}"  autofocus autocomplete="edad" />
                    @error('edad')
                    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                    @enderror
            </div>

            <!-- Provincia -->
            <div class="form-group">
                <x-input-label for="provincia" :value="__('Provincia')" />
                <select id="sel_provincia" name="provincia_id">
                    <option value="">---seleccione una provincia</option>
                    {{-- leer las provincias --}}
{{-- @foreach ($provincias['data'] as $provincia)
                        <option value='{{ $provincia->id }}' {{ isset($user->provincia_id) && $user->provincia_id == $provincia->id ? 'selected' : '' }}>{{ $provincia->nombre }}</option>
                    @endforeach --}}
{{-- <option value="Azuay"
                                {{ isset($user->provincia) && $user->provincia == 'Azuay' ? 'selected' : '' }}>Azuay
                            </option>
                            <option value="Bolivar"
                                {{ isset($user->provincia) && $user->provincia == 'Bolivar' ? 'selected' : '' }}>Bolivar
                            </option>
                            <option value="Cañar"
                                {{ isset($user->provincia) && $user->provincia == 'Cañar' ? 'selected' : '' }}>Cañar
                            </option>
                            <option value="Carchi"
                                {{ isset($user->provincia) && $user->provincia == 'Carchi' ? 'selected' : '' }}>Carchi
                            </option> --}}

{{-- </select>
                @error('provincia')
                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                @enderror
            </div> --}}

<!-- Ciudad -->
{{-- <div class="form-group">
                <x-input-label for="ciudad" :value="__('Ciudad')" />
                <select id="sel_ciudades" name="ciudad_id">
                    <option value=" ">--selecciona la cuidad--</option>
                         @foreach ($ciudades['data'] as $ciudad)
                            <option value="{{ $ciudad->id }}" {{ isset($user->ciudad_id) && $user->ciudad_id == $ciudad->id ? 'selected' : '' }}>
                            {{ $ciudad->nombre_ciudad }}
                            </option>
                        @endforeach
                </select>
                @error('ciudad')
                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                @enderror
            </div> --}}

<!-- direccion -->
{{-- <div class="form-group">
                <x-input-label for="direccion" :value="__('Dirección')" />
                <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion"
                    value="{{ isset($user->direccion) ? $user->direccion : old('direccion') }}"  autofocus
                    autocomplete="direccion" />
                    @error('direccion')
                    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                    @enderror
            </div>

                <!-- Genero -->
            <div class="form-group">
                    <x-input-label for="genero" value="{{ isset($user->genero) ? $user->genero : '' }}" /> Genero
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
                    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                    @enderror
            </div> --}}

<!-- estado civil -->
{{-- <div class="form-group">
                    <x-input-label for="estado_civil" /> estado civil <br>
                    <select id="estado_civil" value="{{ isset($user->estado_civil) ? $user->estdo_civil : '' }}"
                        name="estado_civil">
                        <option
                            value="soltero"{{ isset($user->estado_civil) && $user->estado_civil == 'soltero' ? 'selected' : '' }}>
                            Soltero</option>
                        <option value="casado"
                            {{ isset($user->estado_civil) && $user->estado_civil == 'casado' ? 'selected' : '' }}>
                            Casado
                        </option>
                        <option value="viudo"
                            {{ isset($user->estado_civil) && $user->estado_civil == 'viudo' ? 'selected' : '' }}>Viudo
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
                    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                    @enderror
            </div> --}}

<!-- hobbies -->
{{-- <div class="form-group">
                    <x-input-label for="hobbies" :value="__('Hobbies')" />
                    <select id="hobbies" name="hobbies[]" multiple>
                        <option value="futbol" {{ in_array('futbol', explode(',', $user->hobbies)) ? 'selected' : '' }}>Jugar fútbol</option>
                        <option value="leer" {{ in_array('leer', explode(',', $user->hobbies)) ? 'selected' : '' }}>Leer</option>
                        <option value="escuchar-musica" {{ in_array('escuchar-musica', explode(',', $user->hobbies)) ? 'selected' : '' }}>Escuchar música</option>
                        <option value="viajar" {{ in_array('viajar', explode(',', $user->hobbies)) ? 'selected' : '' }}>Viajar</option>
                        <option value="cocinar" {{ in_array('cocinar', explode(',', $user->hobbies)) ? 'selected' : '' }}>Cocinar</option> --}}
{{-- </select>
                    <br>
                    @error('hobbies[]')
                    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                    @enderror
            </div> --}}

<!-- foto -->
{{-- <div class="form-group">
                    <x-input-label for="foto" value="{{ isset($user->foto) ? $user->foto : old('foto') }}"
                        :value="__('Foto')" />
                    @if (@isset($user->foto))
                        <img src="{{ asset('storage') . '/' . $user->foto }}" width="100" alt="">
                    @endif
                    <input type="file" id="foto" name="foto" accept="image/*">
                    <br>
                    @if (isset($user->foto))
                        <p>URL de la imagen guardada: {{ asset('storage') . '/' . $user->foto }}</p>
                    @endif
                    @error('foto')
                    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                    @enderror --}}
{{-- </div>
            <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        <input class="btn btn-success" type="submit" value="Guardar">
                    </x-primary-button>
                    <a class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                        href="{{ url('user/') }}">regresar</a>
            </div>
        </div> --}}
{{-- </form> --}}
{{-- <body>
        {{-- libreria jquery --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
        </script> --}}
{{-- </body> --}}
{{-- </x-guest-layout>*/ --}}
