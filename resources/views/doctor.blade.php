@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><span class="badge badge-primary">Crear/Editar</span>Doctor</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title">Nuevo Doctor</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('guardar.doctor')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$doctor->id}}">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control border-primary" id="nombre" value="{{$doctor->nombre}}" name="nombre" placeholder="Doctor" required>
                            
                            <label for="nombre">Apellidos</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control border-primary" id="app_pat" value="{{$doctor->apellido_paterno}}" name="app_pat" placeholder="Paterno" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control border-primary" id="app_mat" value="{{$doctor->apellido_materno}}" name="app_mat" placeholder="Materno" required>
                                </div>
                            </div>
                            
                            <label for="id_especialidad" class="form-label">Especialidad</label>
                            @php $doc_espe = 'Sin especialidad'; @endphp
                            @foreach ($especialidades as $especialidad)
                                @if ($especialidad->id == $doctor->id_especialidad)
                                    @php $doc_espe = $especialidad->nombre; @endphp 
                                @endif
                            @endforeach

                            <select class="form-control border-primary" id="id_especialidad" name="id_especialidad" required>
                                <option value="">{{$doc_espe}}</option>
                                @foreach ($especialidades as $especialidad)
                                    <option value="{{ $especialidad->id }}" data-id="{{ $especialidad->id }}" @if ($especialidad->id == $doctor->id_especialidad) selected @endif>
                                        {{ $especialidad->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            
                            <div class="row">
                                <div class="col">
                                    <label for="cedula">Cédula</label>
                                    <input type="text" class="form-control border-primary" id="cedula" value="{{$doctor->cedula}}" name="cedula" placeholder="Cédula" required>
                                </div>
                                <div class="col">
                                    <label for="telefono">Teléfono</label>
                                    <input type="number" class="form-control border-primary" id="telefono" value="{{$doctor->telefono}}" name="telefono" placeholder="00 0000 0000" required>
                                </div>
                            </div>
                            
                            <label for="email">Correo</label>
                            <input type="email" class="form-control border-primary" id="email" value="" name="email" placeholder="correo@gmail.com" required>
                            
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control border-primary" id="password" value="" name="password" placeholder="********" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop