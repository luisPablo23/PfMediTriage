@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Listado de Pacientes</h1>
        <a href="{{ route('patients.create') }}" class="btn btn-success">+ Nuevo Paciente</a>
    </div>
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Teléfono</th>
                    <th>Último Triaje</th>
                    <th>Prioridad</th>
                    <th>Acciones</th> <!-- Nueva columna para botones -->
                </tr>
            </thead>
            <tbody>
                @forelse($patients as $patient)
                <tr>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->age }} años</td>
                    <td>{{ $patient->phone }}</td>
                    <td>
                        @if($patient->triageEntries->first())
                            {{ $patient->triageEntries->first()->symptoms }}
                        @else
                            <span class="text-muted">Sin triaje</span>
                        @endif
                    </td>
                    <td>
                        @if($patient->triageEntries->first())
                            @php $priority = $patient->triageEntries->first()->priority; @endphp
                            <span class="badge 
                                {{ $priority == 'red' ? 'bg-danger' : 
                                   ($priority == 'yellow' ? 'bg-warning' : 'bg-success') }}">
                                {{ strtoupper($priority) }}
                            </span>
                        @endif
                    </td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('patients.edit', $patient) }}" class="btn btn-sm btn-primary">Editar</a>

                        <form action="{{ route('patients.destroy', $patient) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este paciente?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No hay pacientes registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection