@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><span class="badge badge-primary">Crear/Editar</span>Paciente</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title">Nuevo Paciente</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('guardar.paciente')}}" method="POST" id="pacienteForm">
                        @csrf
                        <input type="hidden" name="id" value="{{$paciente->id}}">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control border-primary" id="nombre" value="{{$paciente->nombre}}" name="nombre" placeholder="Paciente" required>
                            <div class="invalid-feedback">
                                Por favor, ingrese solo letras.
                            </div>

                            <label for="app_pat">Apellidos</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control border-primary" id="app_pat" value="{{$paciente->apellido_paterno}}" name="app_pat" placeholder="Paterno" required>
                                    <div class="invalid-feedback">
                                        Por favor, ingrese solo letras.
                                    </div>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control border-primary" id="app_mat" value="{{$paciente->apellido_materno}}" name="app_mat" placeholder="Materno" required>
                                    <div class="invalid-feedback">
                                        Por favor, ingrese solo letras.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="telefono">Teléfono</label>
                                    <input type="number" class="form-control border-primary" id="telefono" value="{{$paciente->telefono}}" name="telefono" placeholder="00 0000 0000" required>
                                </div>
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
    function restrictInputToLettersOnly(elementId) {
        document.getElementById(elementId).addEventListener('input', function (event) {
            let value = event.target.value;
            event.target.value = value.replace(/[^a-zA-Z\s]/g, '');
        });
    }

    restrictInputToLettersOnly('nombre');
    restrictInputToLettersOnly('app_pat');
    restrictInputToLettersOnly('app_mat');

    (function () {
        'use strict';
        window.addEventListener('load', function () {
            var form = document.getElementById('pacienteForm');
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
