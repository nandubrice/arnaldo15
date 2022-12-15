@extends('pagPlantilla') 

@section('titulo')
    <h1 class="display-4">Página de lista </h1>
@endsection

@section('Cuerpo')
    @if(session('msj'))
        <div class="alert alert-success">
            {{ session('msj') }}
        </div>
    @endif

    <div class="btn btn-success d-grid fs-5 mb-2">Registrar nuevo seguimiento...</div>

    <form action="{{ route ('Curso.xRegistar') }} " method="post" class="d-grid gap-2">
        @csrf
        
        @error('denCur')
            <div class="alert alert-danger">
                La Denominacion del curso es requerido
            </div>
        @enderror

        @error('hrsCur')
            <div class="alert alert-danger">
                La Horas del curso es requerido 
            </div>
        @enderror

        @error('creCur')
            <div class="alert alert-danger">
                El Creditos de curso es requerido 
            </div>
        @enderror

        @error('plaCur')
            <div class="alert alert-danger">
                El Año de plan de estudios es requerido 
            </div>
        @enderror

        @error('tipCur')
            <div class="alert alert-danger">
                El Tipo es requerido 
            </div>
        @enderror

        @error('estCur')
            <div class="alert alert-danger">
                El Estado de curso es requerido 
            </div>
        @enderror

        
        <input type="text" name="denCur" placeholder="Denominacion del curso" value="{{ old('denCur')}}" class="form-control mb-1">
        <select name="hrsCur" class="form-control mb-1">
            <option value="">Horas del curso...</option>
            @for($i=1; $i < 10; $i++)
                <option value="{{$i}}">{{$i}} Horas</option>
            @endfor
        </select>
        
        <select name="creCur" class="form-control mb-1">
            <option value="">Creditos de curso...</option>
            @for($i=1; $i < 10; $i++)
                <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>

        <select name="plaCur" class="form-control mb-1">
            <option value="">Año de plan de estudios...</option>
            @for($i=1890; $i < 2022; $i++)
                <option value="{{$i}}">Año {{$i}}</option>
            @endfor
        </select>
        <select name="tipCur" class="form-control mb-1">
            <option value="">Tipo...</option>
            <option value="Transversal">Transversal</option>
            <option value="Especialidad">Especialidad</option>
        </select>
        
        <select name="estCur" class="form-control mb-1">
            <option value="">Estado de curso...</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
        </select>
        <button class="btn btn-success" type="submit">Agregar</button>
    </form>

    <div class="btn btn-dark d-grid fs-5 mb-2 bt-2">Lista de seguimiento...</div>
    
    <table class="table">
        <thead class="table-secondary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre del curso</th>
                <th scope="col">Tipo</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>

        <tbody>
            @foreach($xListaCurso as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>
                    <a href="{{ route('Curso.pagDetalleCurso', $item->id) }}">
                        {{ $item->denCur }}
                    </a>
                </td>
                <td>{{ $item->tipCur }}</td>
                
                <td>
                    <form action="{{ route('Curso.xEliminar', $item->id) }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">x</button>
                    </form>
                    
                    <a class="btn btn-warning btn-sm" href="{{ route('Curso.xActualizar', $item->id) }}">
                    A
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>

        <thead class="table-secondary">
            <tr>
                <th colspan="4">.</th>
            </tr>
        </thead>

    </table>
   



   
@endsection