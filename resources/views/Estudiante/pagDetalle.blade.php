@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Página Detalle </h1>
@endsection

@section('seccion')
    <h3> Detalles </h3>
    <p> Id :                     {{ $xDetAlumnos -> id}} </p>
    <p> Código :                 {{ $xDetAlumnos -> codEst}} </p>
    <p> Nombre :                 {{ $xDetAlumnos -> nomEst}} </p>
    <p> Apellido :               {{ $xDetAlumnos -> apeEst}} </p>
    <p> Fecha de Nacimiento :    {{ $xDetAlumnos -> fnaEst}} </p>
    <p> Turno :                  {{ $xDetAlumnos -> turnMat}} </p>
    <p> Semestre :               {{ $xDetAlumnos -> semMat}} </p>
    <p> Estado de Matrícula :    {{ $xDetAlumnos -> estMat}} </p>
@endsection