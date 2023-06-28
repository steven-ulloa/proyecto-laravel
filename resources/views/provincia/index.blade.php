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
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
                    </script>
                    <div class="text-center">
                        <h1>lista de Provincias</h1>
                    </div>

                    <a class="btn btn-info" href="{{ url('provincia/create') }}">registrar provincias</a>
                    <div class="col-xl-12">
                        <form action="{{route('provincia')}}" method="get">
                            <div class="form-row">
                                <div class="col-sm-4 mt-5 ">
                                    <input type="text" class="form-control" name="texto" value="{{$texto}}">
                                </div>
                                <div class="col-auto mt-1">
                                    <input type="submit" class="btn btn-primary" value="Buscar">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="responsive py-12 ">
                        <table class="table table-light table-bordered table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($provincias as $provincia)
                                    <tr>
                                        <td>{{ $provincia->id }}</td>
                                        <td>{{ $provincia->nombre}}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ url('/provincia/' . $provincia->id . '/edit') }}">
                                                editar</a>
                                            {{-- ESTO DE AQUI ES PARA CREAR EL BOTON ELIMINAR --}}
                                            <form action="{{ url('/provincia/' . $provincia->id) }}" method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <input type="submit" class="btn btn-danger"
                                                    onclick="return confirm('¿quieres borrar este registro?')"
                                                    value="Borrar">
                                            </form>
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
</x-app-layout>

