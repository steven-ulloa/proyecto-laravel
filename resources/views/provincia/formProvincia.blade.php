{{-- <x-app-layout> --}}
    <x-guest-layout>
        <div class="container">
            
            @csrf

            <!-- Nombre -->
            <div class="form-group">
                <x-input-label for="nombre" :value="__('Nombre')" />
                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                    value="{{ isset($provincia->nombre) ? $provincia->nombre : old('nombre') }}" id="" autofocus
                    autocomplete="nombre" />
                {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                    {{-- <x-input-error-registro :messages="$errors->get('name')" class="mt-2" /> --}}
                        @error('nombre')
                        <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                        @enderror
            </div>


            {{-- botones --}}
            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    <input class="btn btn-success" type="submit" value="Guardar">
                </x-primary-button>

                <a class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                        href="{{ url('user/') }}">regresar</a>
            </div>
        </div>
    </x-guest-layout>
    {{-- </x-app-layout> --}}
