@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><span class="badge badge-primary">Crear/Editar</span>Especialidad</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title">Nueva Especialidad</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('guardar.especialidad')}}" method="POST" id="especialidadForm">
                        @csrf
                        <input type="hidden" name="id" value="{{$especialidad->id}}">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control border-primary" id="nombre" value="{{$especialidad->nombre}}" name="nombre" placeholder="Especialidad" required>
                            <div class="invalid-feedback">
                                Por favor, ingrese solo letras.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('nombre').addEventListener('input', function (event) {
        let value = event.target.value;
        event.target.value = value.replace(/[^a-zA-Z\s]/g, '');
    });

    (function () {
        'use strict';
        window.addEventListener('load', function () {
            var form = document.getElementById('especialidadForm');
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        }, false);
    })();
</script>

@stop
