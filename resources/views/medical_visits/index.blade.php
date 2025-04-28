<!-- resources/views/medical_visits/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Visitas Médicas</h1>
        <a href="{{ route('medical_visits.create') }}" class="btn btn-primary">Agregar Visita</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Triaje</th>
                    <th>Doctor</th>
                    <th>Diagnostico</th>
                    <th>Tratamiento</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medicalVisits as $medicalVisit)
                    <tr>
                        <td>{{ $medicalVisit->triageEntry->id }}</td>
                        <td>{{ $medicalVisit->doctor->name }}</td>
                        <td>{{ $medicalVisit->diagnosis }}</td>
                        <td>{{ $medicalVisit->treatment }}</td>
                        <td>{{ $medicalVisit->status }}</td>
                        <td>
                            <a href="{{ route('medical_visits.show', $medicalVisit) }}" class="btn btn-info btn-sm">Ver Detalles</a>
                            <a href="{{ route('medical_visits.edit', $medicalVisit) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('medical_visits.destroy', $medicalVisit) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
