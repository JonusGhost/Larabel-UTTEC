@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><span class="badge badge-primary">Crear/Editar</span>Especialidad</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Nueva Especialidad</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('guardar.especialidad')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$especialidad->id}}">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" value="{{$especialidad->nombre}}" name="nombre" placeholder="Especialidad" required>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@stop
