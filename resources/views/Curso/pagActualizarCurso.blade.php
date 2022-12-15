@extends('pagPlantilla')

@section('Titulo')
    <h1 class="display-4">Pagina de actualizar </h1>
@endsection

@section('Cuerpo')
@if(session('msj'))
        <div class="alert alert-success">
            {{ session('msj') }}
        </div>
    @endif

    <div class="btn btn-success d-grid fs-5 mb-2">Registrar nuevo seguimiento...</div>

    <form action=" {{ route ('Curso.xUpdate' ,$xActCurso -> id)}}" method="post" class="d-grid gap-2">
        @method('PUT')
        @csrf
        
        <input type="text" name="denCur" placeholder="Denominacion del curso" value="{{ $xActCurso -> denCur}}" class="form-control mb-1">
        
        <select name="hrsCur" class="form-control mb-1">
            <option value="">Horas del curso...</option>
            @for($i=0; $i < 10; $i++)
                <option value="{{$i}}" @if ($xActCurso-> hrsCur == $i) {{"SELECTED"}} @endif>{{$i}}</option>
            @endfor
        </select>

        <select name="creCur" class="form-control mb-1">
            <option value="">Creditos de curso...</option>
            @for($i=1; $i < 10; $i++)
                <option value="{{$i}}" @if ($xActCurso-> creCur == $i) {{"SELECTED"}} @endif>{{$i}}</option>
            @endfor
        </select>
        <select name="plaCur" class="form-control mb-1">
            <option value="">Año de plan de estudios...</option>
            @for($i=1890; $i < 2022; $i++)
                <option value="{{$i}}" @if ($xActCurso-> plaCur == $i) {{"SELECTED"}} @endif>{{$i}}</option>
            @endfor
        </select>
        <select name="tipCur" class="form-control mb-1">
            <option value="">Tipo...</option>
            <option value="Transversal" @if ($xActCurso-> tipCur == "Transversal") {{"SELECTED"}} @endif>Transversal</option>
            <option value="Especialidad" @if ($xActCurso-> tipCur == "Especialidad") {{"SELECTED"}} @endif>Especialidad</option>
        </select>
        
        <select name="estCur" class="form-control mb-1">
            <option value="">Estado de curso...</option>
            <option value="0" @if ($xActCurso-> estCur == 0) {{"SELECTED"}} @endif>Inactivo</option>
            <option value="1" @if ($xActCurso-> estCur == 1) {{"SELECTED"}} @endif>Activo</option>
        </select>
        <button class="btn btn-success" type="submit">Agregar</button>
    </form>

@endsection