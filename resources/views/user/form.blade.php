
<x-guest-layout>
    <div class="container">

        @csrf
        <!-- Name -->
        <div class="form-group">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                value="{{ isset($user->name) ? $user->name : old('name') }}" id="" autofocus
                autocomplete="name" />
            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                {{-- <x-input-error-registro :messages="$errors->get('name')" class="mt-2" /> --}}
                    @error('name')
                    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                    @enderror
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                value="{{ isset($user->email) ? $user->email : old('email') }}" autocomplete="email" />
                <x-input-error-registro :messages="$errors->get('email')" class="mt-2" />
                    @error('email')
                    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                    @enderror
            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
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
            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
        </div>
        <!-- cedula -->
        <div class="form-group">
            <x-input-label for="cedula" :value="__('Cedula')" />
            <x-text-input id="cedula" class="block mt-1 w-full" type="number" name="cedula"
                value="{{ isset($user->cedula) ? $user->cedula : old('cedula') }}" autofocus autocomplete="cedula" />
                @error('cedula')
                    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                @enderror
            {{-- <x-input-error :messages="$errors->get('cedula')" class="mt-2" /> --}}
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
            {{-- <x-input-error :messages="$errors->get('username')" class="mt-2" /> --}}
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
            {{-- <x-input-error :messages="$errors->get('apellido')" class="mt-2" /> --}}
        </div>
         <!-- fecha -->
         <div class="form-group">
            <x-input-label for="fecha" :value="__('Fecha de nacimiento')" />
            <x-text-input id="fecha" class="block mt-1 w-full" type="date" name="fecha"
                value="{{ isset($user->fecha) ? calculateAge($user->fecha) : old('edad') }}" autofocus autocomplete="edad" />
                @error('fecha')
                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
            @enderror
            {{-- <x-input-error :messages="$errors->get('fecha')" class="mt-2" /> --}}
        </div>
        <!-- edad -->
        <div class="form-group">
            <x-input-label for="edad" :value="__('Edad')" />
            <x-text-input id="edad" class="block mt-1 w-full" type="number" name="edad"
                value="{{ isset($user->edad) ? $user->edad : old('edad') }}" autofocus autocomplete="edad" />
                @error('edad')
                    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
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
                    <option value='{{ $provincia->id }}'>{{ $provincia->nombre }}</option>
                @endforeach
            </select>
            @error('provincia_id')
                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
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
                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
            @enderror
            {{-- <x-input-error :messages="$errors->get('ciudad')" class="mt-2" /> --}}
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
                {{-- <x-input-error :messages="$errors->get('direccion')" class="mt-2" /> --}}
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
                {{-- <x-input-error :messages="$errors->get('genero')" class="mt-2" /> --}}
        </div>

        <!-- estado civil -->
        <div class="form-group">
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
                {{-- <x-input-error :messages="$errors->get('estdo_civil')" class="mt-2" /> --}}
        </div>

        <!-- hobbies -->
        <div class="form-group">
                <x-input-label for="hobbies" :value="__('Hobbies')" />
                <select id="hobbies" name="hobbies[]" multiple>
                    <option value="futbol"
                        {{ isset($user->hobbies) && $user->hobbies == 'futbol' ? 'selected' : '' }}>Jugar fútbol
                    </option>
                    <option value="leer" {{ isset($user->hobbies) && $user->hobbies == 'leer' ? 'selected' : '' }}>
                        Leer</option>
                    <option value="escuchar-musica"
                        {{ isset($user->hobbies) && $user->hobbies == 'escuchar-musica' ? 'selected' : '' }}>Escuchar
                        música</option>
                    <option value="viajar"
                        {{ isset($user->hobbies) && $user->hobbies == 'viajar' ? 'selected' : '' }}>Viajar</option>
                    <option value="cocinar"
                        {{ isset($user->hobbies) && $user->hobbies == 'cocinar' ? 'selected' : '' }}>Cocinar
                    </option>
                </select>
                <br>
                @error('hobbies')
                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
            @enderror
                {{-- <x-input-error :messages="$errors->get('hobbies')" class="mt-2" /> --}}
        </div>

        <!-- foto -->
        <div class="form-group">
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
                @enderror
                {{-- <x-input-error :messages="$errors->get('foto')" class="mt-2" /> --}}
        </div>

        {{-- botones --}}
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                <input id="submitBtn" class="btn btn-success" type="submit" value="Guardar">
            </x-primary-button>

            <a class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                    href="{{ url('user/') }}">regresar</a>
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

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

            <script type='text/javascript'>
                $(document).ready(function() {
        // Obtener el valor de la fecha cuando cambie
                    $('#fecha').change(function() {
                        var fechaNacimiento = $(this).val();
                        var edad = calculateAge(fechaNacimiento);
                        $('#edad').val(edad);
                    });
                });

    // Función para calcular la edad a partir de la fecha de nacimiento
                function calculateAge(dateOfBirth) {
                 var today = new Date();
                    var birthDate = new Date(dateOfBirth);
                    var age = today.getFullYear() - birthDate.getFullYear();
                    var month = today.getMonth() - birthDate.getMonth();
                    if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
                        age--;
                    }
                    return age;
                }
            </script>

{{-- <script>
    $(document).ready(function() {
      $('#submitBtn').click(function() {
        var formData = $('#myForm').serializeArray();
        var jsonData = {};

        $.each(formData, function(_, field) {
          jsonData[field.name] = field.value;
        });

        $.ajax({
          url: 'URL_DEL_ENDPOINT',
          type: 'POST',
          data: JSON.stringify(jsonData),
          contentType: 'application/json',
          success: function(response) {
            // Manejar la respuesta del servidor
          },
          error: function(error) {
            // Manejar el error de la solicitud AJAX
          }
        });
      });
    });
  </script> --}}


        </body>
</x-guest-layout>

