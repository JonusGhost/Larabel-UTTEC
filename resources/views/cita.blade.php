@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><span class="badge badge-primary">Asignar</span>Doctor</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Doctor a Cita</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('doctor.cita')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$cita->id}}">
                        <div class="form-group">
                            <label for="numero">Especialidad</label>
                            @foreach ($especialidades as $especialidad)
                                @if ($especialidad->id == $cita->id_especialidad)
                                    <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{ $especialidad->nombre }}" readonly>
                                    @php $doc_espe = $especialidad->id; @endphp
                                @endif
                            @endforeach

                            <label for="numero">Doctor</label>
                            @php $doc_asig = 'Sin doctor'; @endphp

                            <select class="form-control" id="id_doctor" name="id_doctor" required>
                                <option value="">{{$doc_asig}}</option>
                                @foreach ($doctor as $doctor)
                                    @if ($doctor->id_especialidad == $doc_espe)
                                    <option value="{{ $doctor->id }}" @if ($doctor->id == $cita->id_doctor) selected @endif>
                                        {{ $doctor->nombre }}
                                    </option>
                                    @endif
                                @endforeach
                            </select>
                            
                            <label for="id_consultorio" class="form-label">Consultorio</label>
                            @php $con_asig = 'Sin consultorio'; @endphp

                            <select class="form-control" id="id_consultorio" name="id_consultorio" required>
                                <option value="">{{$con_asig}}</option>
                                @foreach ($consultorios as $consultorios)
                                    <option value="{{ $consultorios->id }}" @if ($consultorios->id == $cita->id_consultorio) selected @endif>
                                        {{ $consultorios->numero }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@stop