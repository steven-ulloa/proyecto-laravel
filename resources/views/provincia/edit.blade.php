
<h1 class="text-center font-bold">formulario para editar users</h1>
@include('layouts.navigation')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<x-guest-layout>
    <form action="{{ route('provincia.update', $provincia->id) }}" method="post" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @csrf
        <!-- Name -->
        <div class="form-group">
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                value="{{ isset($provincia->nombre) ? $provincia->nombre : old('nombre') }}" id="" autofocus
                autocomplete="nombre" />
            @error('nombre')
                <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
            @enderror
            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                <input class="btn btn-success" type="submit" value="Guardar">
            </x-primary-button>
            <a class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                href="{{ url('provincia/') }}">regresar</a>
        </div>
        </div>
    </form>
</x-guest-layout>
