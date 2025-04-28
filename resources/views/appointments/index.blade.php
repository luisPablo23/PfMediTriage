@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Registros de Citas</h1>

    <a href="{{ route('appointments.create') }}" class="btn btn-primary mb-3">Nueva Cita</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Recepcionista</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Razón</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->patient->name }}</td>
                <td>{{ $appointment->receptionist->name }}</td>
                <td>{{ $appointment->date->format('d/m/Y') }}</td>
                <td>{{ $appointment->time }}</td>
                <td>{{ $appointment->reason }}</td>
                <td>
                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta cita?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection