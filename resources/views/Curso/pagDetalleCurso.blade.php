@extends('pagPlantilla')

@section('Titulo')
    <h1 class="display-4">Pagina lista </h1>
@endsection

@section('Cuerpo')
    <h3> Detalle Cursos </h3>
    
    <p>id:                                   {{ $xDetMateria ->id}} </p>
    <p>Denominacion del curso:               {{ $xDetMateria ->denCur}} </p>
    <p>Horas del curso:                      {{ $xDetMateria ->hrsCur}} </p>
    <p>Creditos de curso:                    {{ $xDetMateria ->creCur}} </p>
    <p>Año de plan de estudios:              {{ $xDetMateria ->plaCur}} </p>
    <p>Tipo:                                 {{ $xDetMateria ->tipCur}} </p>
    <p>Estado de curso:                      {{ $xDetMateria ->estCur}} </p>


@endsection

