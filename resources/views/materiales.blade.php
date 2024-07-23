@extends('adminlte::page')

@section('title', 'Lista de Doctores')

@section('content_header')
    <h1>Lista de Materiales</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">Materiales</div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Codigo</th>
                                    <th>Descripcion</th>
                                    <th>Fecha de Caducidad</th>
                                    <th>Existencia</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materiales as $material)
                                    <tr><td>{{ $material->id }}</td>
                                        <td>{{ $material->codigo }}</td>
                                        <td>{{ $material->descripcion }}</td>
                                        <td>{{ $material->fecha_caducidad }}</td>
                                        <td>{{ $material->existecia }}</td>
                                        
                                        <td>
                                            <a href="{{ route('nuevo.material', ['id' => $material->id]) }}" class="btn btn-primary">Editar</a>
                                            
                                            <form action="{{ route('borrar.material') }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $material->id }}">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta especialidad?');">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
