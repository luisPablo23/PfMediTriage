@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Registros de Triaje</h1>

    <a href="{{ route('triage_entries.create') }}" class="btn btn-primary mb-3">Nuevo Triaje</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Enfermero</th>
                <th>Síntomas</th>
                <th>Prioridad</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($triageEntries as $triage)
            <tr>
                <td>{{ $triage->patient->name ?? 'N/A' }}</td>
                <td>{{ $triage->nurse->name ?? 'N/A' }}</td>
                <td>{{ Str::limit($triage->symptoms, 50) }}</td>
                <td>
                    <span class="badge 
                        @switch($triage->priority)
                            @case('red') bg-danger @break
                            @case('yellow') bg-warning text-dark @break
                            @case('green') bg-success @break
                            @default bg-primary
                        @endswitch">
                        {{ strtoupper($triage->priority) }}
                    </span>
                </td>
                <td>
                    @if($triage->created_at)
                        {{ $triage->created_at->format('d/m/Y H:i') }}
                    @else
                        Fecha no disponible
                    @endif
                </td>
                <td>
                    <a href="{{ route('triage_entries.edit', $triage->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('triage_entries.destroy', $triage->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection