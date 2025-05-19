<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{asset('js/app.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{$titulo}}</title>
</head>

<body class="body">
    <section class="v-100">
        @include('components/navbar')
        <div class="container mt-4">
            @yield('contenido')
        </div>
    </section>
    <footer class="mt-auto py-3 text-center text-secondary">
        <small>&copy; {{ date('Y') }} Derechos reservados por Javier.</small>
    </footer> 


</body>

</html>