@extends('plantilla')

@section('contenido')
<div class="container mt-4">
    <div class="row justify-content-center">
        <form method="POST" action="{{ route('insertar') }}" class="col-md-5">
            @csrf

            <div class="form-group mb-3">
                <label for="titulo">Título</label>
                <input name="titulo" id="titulo" class="form-control" type="text" required>
            </div>

            <div class="form-group mb-3">
                <label for="descripcion">Descripción</label>
                <input name="descripcion" id="descripcion" class="form-control" type="text">
            </div>

            <div class="form-group mb-3">
                <label for="director">Director</label>
                <input name="director" id="director" class="form-control" type="text">
            </div>

            <div class="form-group mb-3">
                <label for="genero">Género</label>
                <input name="genero" id="genero" class="form-control" type="text">
            </div>

            <div class="form-group mb-3">
                <label for="fecha_estreno">Fecha de estreno</label>
                <input type="date" name="fecha_estreno" id="fecha_estreno" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3">Añadir</button>
        </form>
    </div>
</div>
@endsection
