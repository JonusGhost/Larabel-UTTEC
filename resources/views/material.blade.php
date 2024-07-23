@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><span class="badge badge-primary">Crear/Editar</span>Material</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Nuevo Material</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('guardar.material')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$material->id}}">
                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <input type="text" class="form-control" id="codigo" value="{{$material->codigo}}" name="codigo" placeholder="0000 0000" required>    
                            <label for="descripcion">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" value="{{$material->descripcion}}" name="descripcion" placeholder="Descripcion..." required>
                                
                            <div class="row">
                                <div class="col">
                                    <label for="precio">Precio</label>
                                    <input type="text" class="form-control" id="precio" value="{{$material->precio}}" name="precio" placeholder="$ 0000" required>
                                </div>
                                <div class="col">
                                    <label for="fecha_caducidad">Fecha Caducidad</label>
                                    <input type="date" class="form-control" id="fecha_caducidad" value="{{$material->fecha_caducidad}}" name="fecha_caducidad" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="existencia">Existencia</label>
                                    <input type="number" class="form-control" id="existencia" value="{{$material->existecia}}" name="existencia" placeholder="0000" required>
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