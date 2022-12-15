<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

    <div class="container my-5">
        <a href="{{ route('xIndex') }}" class="btn btn-danger">Inicio </a>
        <a href="{{ route('xGaleria') }}" class="btn btn-danger">Galeria </a>
        <a href="{{ route('xLista') }}" class="btn btn-danger">Lista </a>
        <a href="{{ route('xListaCurso') }}" class="btn btn-danger">Lista Curso </a>
    </div>

    <div class="container my-4">
        @yield('titulo')
    </div>

    <div class="container my-3">
        @yield('seccion')
    </div>

    <div class="container bg-dark text-white text-center">
        Pie de pagina
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>