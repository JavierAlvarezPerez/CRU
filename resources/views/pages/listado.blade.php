@extends('plantilla')
@section('contenido')
<div class="row justify-content-center mt-5">
    <div class="col-10 text-center">
        <h1>Listado de peliculas</h1><br>


        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descricion</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Director</th>
                    <th scope="col">Estreno</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos as $pelicula)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $pelicula->titulo }}</td>
                    <td>{{ $pelicula->descripcion }}</td>
                    <td>{{ $pelicula->genero }}</td>
                    <td>{{ $pelicula->director }}</td>
                    <td>{{ $pelicula->fecha_estreno }}</td>
                    <td>
                        <a href="{{ route('edit', $pelicula->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="{{ route('eliminar', $pelicula->id) }}" class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Estás seguro de que deseas eliminar esta película?')">
                            Eliminar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('agre') }}" class="btn btn-success btn-sm">Agregar nueva</a>
    </div>
</div>
@endsection