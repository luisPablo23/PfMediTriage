@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Especialidades Médicas</h1>

    <a href="{{ route('specialties.create') }}" class="btn btn-primary mb-3">Nueva Especialidad</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($specialties as $specialty)
            <tr>
                <td>{{ $specialty->name }}</td>
                <td>
                    <a href="{{ route('specialties.edit', $specialty->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('specialties.destroy', $specialty->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta especialidad?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
