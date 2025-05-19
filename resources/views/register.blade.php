@extends('plantilla')
@section('contenido')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5 auth-card">
            <form method="POST" action="/registro">
                @csrf
                <h2>Registro</h2>
                <div class="form-group mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre" placeholder="Nombre" value="{{old('nombre')}}">
                </div>
                <div class="form-group mb-3">
                    <label>Apellido Paterno</label>
                    <input type="text" name="apellido_paterno" placeholder="Apellido paterno" value="{{old('apellido_paterno')}}">
                </div>
                <div class="form-group mb-3">
                    <label>Apellido Materno</label>
                    <input type="text" name="apellido_materno" placeholder="Apellido materno" value="{{old('apellido_materno')}}">
                </div>
                <div class="form-group mb-3">
                    <label>Usuario</label>
                    <input type="text" name="usuario" placeholder="Usuario" value="{{old('usuario')}}">
                </div>
                <div class="form-group mb-3">
                    <label>Contraseña</label>
                    <input type="password" name="password" placeholder="Contraseña">
                </div>
                <div class="form-group mb-3">
                    <label>Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" placeholder="Confirmar contraseña">
                </div>
                <button type="submit" class="btn btn-primary w-100">Registrarse</button>
            </form>
            
            @if($errors->any())
                <ul class="error-text">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>

@endsection
