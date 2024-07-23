@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><span class="badge badge-primary">Crear/Editar</span>Paciente</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Nuevo Paciente</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('guardar.paciente')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$paciente->id}}">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" value="{{$paciente->nombre}}" name="nombre" placeholder="Paciente" required>
                            
                            <label for="nombre">Apellidos</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" id="app_pat" value="{{$paciente->apellido_paterno}}" name="app_pat" placeholder="Paterno" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="app_mat" value="{{$paciente->apellido_materno}}" name="app_mat" placeholder="Materno" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="telefono">Telefono</label>
                                    <input type="number" class="form-control" id="telefono" value="{{$paciente->telefono}}" name="telefono" placeholder="00 0000 0000" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@stop