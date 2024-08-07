@extends('adminlte::page')

@section('title', 'Lista de Citas')

@section('content_header')
    <h1>Lista de Citas</h1>
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

                    @if (auth()->check() && auth()->user()->rol == '')
                    <div class="card">
                         <div class="card-header">Citas</div>
    
                             <div class="card-body">
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Fecha</th>
                                            <th>Paciente</th>
                                            <th>Observaciones</th>
                                            <th>Medicamentos</th>
                                            <th>Doctor</th>
                                            <th>Especialidad</th>
                                            <th>Estado</th>
                                            <th>Consultorio</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    @foreach ($citas as $cita)
                                        <tbody>
                                            <tr><td>{{ $cita->id }}</td>
                                                <td>{{ $cita->fecha }}</td>

                                                @php $pac_nombre = 'Sin paciente'; @endphp
                                                @foreach ($pacientes as $paciente)
                                                    @if ($paciente->id == $cita->id_paciente)
                                                        @php $pac_nombre = $paciente->nombre; @endphp 
                                                    @endif
                                                @endforeach
                                                <td>{{ $pac_nombre }}</td>        
                                                <td>{{ $cita->observaciones }}</td>
                                                <td>{{ $cita->medicamentos }}</td>
                                            
                                                @if ($cita->estado == 'Denegada')
                                                    <td>Denegada</td>
                                                    @php $doc_espe = 'Sin especialidad'; @endphp
                                                    @foreach ($especialidades as $especialidad)
                                                        @if ($especialidad->id == $cita->id_especialidad)
                                                            @php $doc_espe = $especialidad->nombre; @endphp 
                                                        @endif
                                                    @endforeach
                                                    <td>{{ $doc_espe }}</td>
                                                    <td>{{ $cita->estado }}</td>
                                                    <td>Denegada</td>
                                                    <td>
                                                        <form action="{{ route('aceptar.cita') }}" method="POST" style="display:inline-block;">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $cita->id }}">
                                                            <button type="submit" class="btn btn-success" onclick="return confirm('¿Estás seguro de que deseas aceptar la cita?');">Aceptar</button>
                                                        </form>
                                                    </td>
                                                    <td></td>
                                                
                                                @elseif ($cita->estado == 'Aceptada')
                                                    @php $doc_nombre = $doctores->firstWhere('id', $cita->id_doctor)?->nombre ?? 'Sin asignar'; @endphp
                                                    <td>{{ $doc_nombre }}</td>
                                                
                                                    @php $doc_espe = 'Sin especialidad'; @endphp
                                                    @foreach ($especialidades as $especialidad)
                                                        @if ($especialidad->id == $cita->id_especialidad)
                                                            @php $doc_espe = $especialidad->nombre; @endphp 
                                                        @endif
                                                    @endforeach
                                                    <td>{{ $doc_espe }}</td>
                                                    <td>{{ $cita->estado }}</td>
                                                
                                                    @php $con_numero = $consultorios->firstWhere('id', $cita->id_consultorio)?->numero ?? 'Sin asignar'; @endphp
                                                    <td>{{ $con_numero }}</td>
                                                        <td>
                                                            <form action="{{ route('denegar.cita') }}" method="POST" style="display:inline-block;">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $cita->id }}">
                                                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro de que deseas cancelar la cita?');">Cancelar</button>
                                                            </form>
                                                            <a href="{{ route('asignar.cita', ['id' => $cita->id]) }}" class="btn btn-primary">Modificar</a>
                                                        </td>
                                                    
                                                @elseif ($cita->estado == 'Pendiente')
                                                    <td></td>
                                                    <td></td>
                                                    
                                                    @php $doc_nombre = $doctores->firstWhere('id', $cita->id_doctor)?->nombre ?? 'En espera...'; @endphp
                                                    <td>{{ $doc_nombre }}</td>
                                                    <td></td>
                                                    <td>
                                                        <form action="{{ route('aceptar.cita') }}" method="POST" style="display:inline-block;">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $cita->id }}">
                                                            <button type="submit" class="btn btn-success" onclick="return confirm('¿Estás seguro de que deseas aceptar la cita?');">Aceptar</button>
                                                        </form>
                                                        <form action="{{ route('denegar.cita') }}" method="POST" style="display:inline-block;">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $cita->id }}">
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas denegar la cita?');">Denegar</button>
                                                        </form>
                                                    </td>
                                                
                                                @else
                                                    @php $doc_nombre = 'Sin cita'; @endphp
                                                @endif                   
                                            </tr>
                                            @endforeach
                                    
                    @elseif (auth()->check() && auth()->user()->rol == 'doctor')
                    <div class="card">
                         <div class="card-header">Citas</div>
    
                             <div class="card-body">
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Fecha</th>
                                            <th>Paciente</th>
                                            <th>Observaciones</th>
                                            <th>Medicamentos</th>
                                            <th>Consultorio</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    @foreach ($doctores as $doctor)
                                    @foreach ($citas as $cita)
                                        @if ($cita->id_doctor == $doctor->id AND $doctor->idusr == auth()->user()->id)
                                        <tr><td>{{ $cita->id }}</td>
                                            <td>{{ $cita->fecha }}</td>
                                            
                                            @php $pac_nombre = 'Sin paciente'; @endphp
                                            @foreach ($pacientes as $paciente)
                                                @if ($paciente->id == $cita->id_paciente)
                                                    @php $pac_nombre = $paciente->nombre; @endphp 
                                                @endif
                                            @endforeach
                                            <td>{{ $pac_nombre }}</td>        
                                            <td>{{ $cita->observaciones }}</td>
                                            <td>{{ $cita->medicamentos }}</td>

                                            @php $con_numero = $consultorios->firstWhere('id', $cita->id_consultorio)?->numero ?? 'Sin asignar'; @endphp
                                            <td>{{ $con_numero }}</td>
                                            
                                            <td>
                                                <a href="{{ route('atender.cita', ['id' => $cita->id]) }}" class="btn btn-primary">Atender</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
