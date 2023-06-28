@include('layouts.navigation')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<x-guest-layout>



    <form action="{{ route('user.show', $user->id) }}" method="post" enctype="multipart/form-data">
        <div class="flex items-center justify-end mt-4 btn btn-outline-danger">
            <a class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 btn btn-danger"
                href="{{ url('user/') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                </svg>
            </a>
        </div>
        <h1 class="text-center ">Usuario: {{ $user->name }}</h1>
        <div class="p-2 " >
            <h1 class="font-semibold">Foto:</h1>
            @if (isset($user->foto))
                <div class="d-flex text-center">
                    <img src="{{ asset('storage') . '/' . $user->foto }}" width="100" alt="">
                </div>
            @endif
        </div>
        <div class="p-2">
            <h1 style="font-weight: bold; display: inline-block;">nombre:</h1>
            <span style="display: inline-block;">{{$user->name}}</span>
        </div>
           {{-- <h1 class="font-semibold "> nombre:</h1> {{$user->name}} --}}
        <div class="p-2">
            <h1 style="font-weight: bold; display: inline-block;">email:</h1>
            <span style="display: inline-block;">{{ $user->email }}</span>
        </div>
            <div class="p-2">
                <h1 style="font-weight: bold; display: inline-block;">password:</h1>
                <span style="display: inline-block;">{{ str_repeat('*', min(strlen($user->password), 15)) }}</span>
            </div>
            <div class="p-2">
                <h1 style="font-weight: bold; display: inline-block;">cedula:</h1>
                <span style="display: inline-block;">{{ $user->cedula }}</span>
            </div>
            <div class="p-2">
                <h1 style="font-weight: bold; display: inline-block;">username:</h1>
                <span style="display: inline-block;">{{ $user->username }}</span>

            </div>
            <div class="p-2">
                <h1 style="font-weight: bold; display: inline-block;">apellido:</h1>
                <span style="display: inline-block;">{{ $user->apellido }}</span>
            </div>
            <div class="p-2">
                <h1 style="font-weight: bold; display: inline-block;">Fecha de nacimiento:</h1>
                <span style="display: inline-block;">{{ $user->fecha }}</span>
            </div>
            <div class="p-2">
                <h1 style="font-weight: bold; display: inline-block;">Edad:</h1>
                <span style="display: inline-block;">{{ $user->edad }}</span>
            </div>
            <div class="p-2">
                <h1 style="font-weight: bold; display: inline-block;">Provincia:</h1>
                <span style="display: inline-block;">{{ $provincias['data']->firstWhere('id', $user->provincia_id)->nombre }}</span>
            </div>
            <div class="p-2">
                <h1 style="font-weight: bold; display: inline-block;">Ciudad:</h1>
                <span style="display: inline-block;">{{ $ciudades['data']->firstWhere('id', $user->ciudad_id)->nombre_ciudad }}</span>
            </div>
            <div class="p-2">
                <h1 style="font-weight: bold; display: inline-block;">Direccion:</h1>
                <span style="display: inline-block;">{{ $user->direccion }}</span>
            </div>
            <div class="p-2">
                <h1 style="font-weight: bold; display: inline-block;">Genero:</h1>
                <span style="display: inline-block;">{{ $user->genero }}</span>
            </div>
            <div class="p-2">
                <h1 style="font-weight: bold; display: inline-block;">Estado Civil:</h1>
                <span style="display: inline-block;">{{ $user->estado_civil }}</span>
            </div>
            <div class="p-2">
                <h1 style="font-weight: bold; display: inline-block;">Hobbies:</h1>
                <span style="display: inline-block;">{{ $user->hobbies }}</span>
            </div>
            <div class="p-2">
                <h1 style="font-weight: bold; display: inline-block;">Genero:</h1>
                <span style="display: inline-block;">{{ $user->genero }}</span>
            </div>




    </form>




</x-guest-layout>
