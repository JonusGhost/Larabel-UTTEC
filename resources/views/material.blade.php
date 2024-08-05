@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><span class="badge badge-primary">Crear/Editar</span>Material</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title">Nuevo Material</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('guardar.material')}}" method="POST" id="materialForm">
                        @csrf
                        <input type="hidden" name="id" value="{{$material->id}}">
                        <div class="form-group">
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control border-primary" id="codigo" value="{{$material->codigo}}" name="codigo" placeholder="0000 0000" required>
                            <div class="invalid-feedback">
                                Por favor, ingrese solo números.
                            </div>
                            
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control border-primary" id="descripcion" value="{{$material->descripcion}}" name="descripcion" placeholder="Descripción..." required>
                                
                            <div class="row">
                                <div class="col">
                                    <label for="precio">Precio</label>
                                    <input type="text" class="form-control border-primary" id="precio" value="{{$material->precio}}" name="precio" placeholder="$ 0000" required>
                                    <div class="invalid-feedback">
                                        Por favor, ingrese solo números.
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="fecha_caducidad">Fecha de Caducidad</label>
                                    <input type="date" class="form-control border-primary" id="fecha_caducidad" value="{{$material->fecha_caducidad}}" name="fecha_caducidad" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="existencia">Existencia</label>
                                    <input type="number" class="form-control border-primary" id="existencia" value="{{$material->existencia}}" name="existencia" placeholder="0000" required>
                                    <div class="invalid-feedback">
                                        Por favor, ingrese solo números.
                                    </div>
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
    function restrictInputToNumbersOnly(elementId) {
        document.getElementById(elementId).addEventListener('input', function (event) {
            let value = event.target.value;
            event.target.value = value.replace(/[^0-9]/g, '');
        });
    }

    restrictInputToNumbersOnly('codigo');
    restrictInputToNumbersOnly('precio');
    restrictInputToNumbersOnly('existencia');

    (function () {
        'use strict';
        window.addEventListener('load', function () {
            var form = document.getElementById('materialForm');
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
