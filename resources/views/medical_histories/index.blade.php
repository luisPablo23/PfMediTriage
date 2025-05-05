@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Registros de Historial Médico</h1>

    <a href="{{ route('medical_histories.create') }}" class="btn btn-primary mb-3">Nuevo Historial Médico</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Condición</th>
                <th>Tratamiento</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicalHistories as $history)
            <tr>
                <td>{{ $history->patient->name ?? 'N/A' }}</td>
                <td>{{ $history->condition }}</td>
                <td>{{ $history->treatment }}</td>
                <td>{{ $history->date ? $history->date->format('d/m/Y') : 'Sin fecha' }}</td>
                <td>
                    <a href="{{ route('medical_histories.edit', $history->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('medical_histories.destroy', $history->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este historial?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection