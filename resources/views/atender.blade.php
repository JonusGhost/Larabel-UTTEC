@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><span class="badge badge-primary">Atender</span>Cita</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Cita</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('atendida.cita')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$cita->id}}">
                        <div class="form-group">
                            <label for="numero">Paciente</label>
                            @foreach ($pacientes as $paciente)
                                @if ($paciente->id == $cita->id_paciente)
                                    <input type="text" class="form-control" id="paciente" name="paciente" value="{{ $paciente->nombre }}" readonly>
                                    @php $doc_espe = $paciente->id; @endphp
                                @endif
                            @endforeach

                            <label for="numero">Observaciones</label>
                            <input type="text" class="form-control" id="observ" name="observ" value="{{ $cita->observaciones }}" placeholder="Observaciones...">

                            <label for="numero">Medicamentos</label>
                            <div class="mb-3">
                                @foreach ($medicamentos as $medicamento)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="{{ $medicamento->codigo }}" name="opciones[]" value="{{ $medicamento->codigo }}">
                                        <label class="form-check-label" for="{{$medicamento->id}}">{{ $medicamento->codigo }}: {{ $medicamento->descripcion }}</label>
                                      </div>
                                @endforeach
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