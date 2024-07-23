@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><span class="badge badge-primary">Crear/Editar</span>Consultorio</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Nuevo Consultorio</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('guardar.consultorio')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$consultorio->id}}">
                        <div class="form-group">
                            <label for="numero">Numero</label>
                            <input type="number" class="form-control" id="numero" value="{{$consultorio->numero}}" name="numero" placeholder="000" required>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@stop