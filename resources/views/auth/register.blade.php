<x-guest-layout>
    <form id="register-form" method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- cedula -->
        <div class="mt-4">
            <x-input-label for="cedula" :value="__('Cedula')" />
            <x-text-input id="cedula" class="block mt-1 w-full" type="number" name="cedula" :value="old('cedula')"
                required autofocus autocomplete="cedula" />
            <x-input-error :messages="$errors->get('cedula')" class="mt-2" />
        </div>

        <!-- username -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- apellido -->
        <div class="mt-4">
            <x-input-label for="apellido" :value="__('Apellido')" />
            <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')"
                required autofocus autocomplete="apellido" />
            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
        </div>

        <!-- fecha -->
        <div class="mt-4">
            <x-input-label for="fecha" :value="__('Fecha de nacimiento')" />
            <x-text-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" :value="old('fecha')"
                required autofocus autocomplete="fecha" />
            <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
        </div>

        <!-- edad -->
        <div class="mt-4">
            <x-input-label for="edad" :value="__('Edad')" />
            <x-text-input id="edad" class="block mt-1 w-full" type="number" name="edad" :value="old('edad')"
                required autofocus autocomplete="edad" />
            <x-input-error :messages="$errors->get('edad')" class="mt-2" />
        </div>



        <!-- Provincia -->
        <div class="mt-4">
            <x-input-label for="provincia" :value="__('Provincia')" />
            <select id="sel_provincia" name="provincia_id">
                <option value="">---seleccione una provincia</option>
                {{-- leer las provincias --}}
                @foreach ($provincias['data'] as $provincia)
                    <option value='{{ $provincia->id }}'>{{ $provincia->nombre }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('provincia')" class="mt-2" />
            {{-- <option value="Azuay">Azuay</option>
                <option value="Bolivar">Bolivar</option>
                <option value="Cañar">Cañar</option>
                <option value="Carchi">Carchi</option> --}}

        </div>

        <!-- Ciudad -->
        <div class="mt-4">
            <x-input-label for="ciudad" :value="__('Ciudad')" />
            <select id="sel_ciudades" name="ciudad_id">
                <option value=" ">--selecciona la cuidad--</option>

                {{-- @foreach ($ciudadData['data'] as $ciudad)
                    <option value='{{ $ciudad->id }}'>{{ $ciudad->nombre_ciudad }}</option>
                @endforeach --}}

            </select>
            <x-input-error :messages="$errors->get('ciudad')" class="mt-2" />
        </div>

        <!-- direccion -->
        <div class="mt-4">
            <x-input-label for="direccion" :value="__('Dirección')" />
            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')"
                required autofocus autocomplete="direccion" />
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>

        <!-- Genero -->
        <div class="mt-4">
            <x-input-label for="genero" :value="__('Género')" />

            <input type="radio" id="masculino" name="genero" value="masculino">
            <label for="masculino">Masculino</label>
            <br>
            <input type="radio" id="femenino" name="genero" value="femenino">
            <label for="femenino">Femenino</label>
            <br>
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>

        <!-- estado civil -->
        <div class="mt-4">
            <x-input-label for="estado_civil" :value="__('Estado Civil')" />
            <select id="estado_civil" name="estado_civil">
                <option value="soltero">Soltero</option>
                <option value="casado">Casado</option>
                <option value="viudo">Viudo</option>
                <option value="divorciado">Divorciado</option>
                <option value="union-Libre">Unión libre</option>
            </select>
            <br>
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>

        <!-- hobbies -->
        <div class="mt-4">
            <x-input-label for="hobbies" :value="__('Hobbies')" />
            <select id="hobbies" name="hobbies[]" multiple>
                <option value="futbol"
                            {{ isset($user->hobbies) && $user->hobbies == 'futbol' ? 'selected' : '' }}>Jugar fútbol
                        </option>
                        <option value="leer"
                            {{ isset($user->hobbies) && $user->hobbies == 'leer' ? 'selected' : '' }}>
                            Leer</option>
                        <option value="escuchar-musica"
                            {{ isset($user->hobbies) && $user->hobbies == 'escuchar-musica' ? 'selected' : '' }}>Escuchar música</option>
                        <option value="viajar"
                            {{ isset($user->hobbies) && $user->hobbies == 'viajar' ? 'selected' : '' }}>Viajar</option>
                        <option value="cocinar"
                            {{ isset($user->hobbies) && $user->hobbies == 'cocinar' ? 'selected' : '' }}>Cocinar
                        </option>
                {{-- <option value="futbol">Jugar fútbol</option>
                <option value="leer">Leer</option>
                <option value="musica">Escuchar música</option>
                <option value="viajar">Viajar</option>
                <option value="cocinar">Cocinar</option> --}}
            </select>
            <br>
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>

        <!-- foto -->
         <div class="mt-4">
            <x-input-label for="foto" :value="__('Foto')" />
            <input type="file" id="foto" name="foto" accept="image/*" required>
            @if (isset($user->foto))
            <img src="{{ asset('storage/' . $user->foto) }}" width="100" alt="">
            @endif
            <br>
            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
        </div>

        {{-- <div class="mt-4">
            <x-input-label for="foto" value="{{ isset($user->foto) ? $user->foto : old('foto') }}"
                :value="__('Foto')" />
                @if (@isset($user->foto))
                    <img src="{{ asset('storage') . '/' . $user->foto }}" width="100" alt="">
                @endif
            <input type="file" id="foto" name="foto" accept="image/*" required>
            <br>
                @if (isset($user->foto))
                    <p>URL de la imagen guardada: {{ asset('storage') . '/' . $user->foto }}</p>
                @endif
             <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                </div> --}}

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4" id="registerBtn">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

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
