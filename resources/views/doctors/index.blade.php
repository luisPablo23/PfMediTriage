@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Registros de Médicos</h1>

    <a href="{{ route('doctors.create') }}" class="btn btn-primary mb-3">Nuevo Médico</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
            <tr>
                <td>{{ $doctor->user->name }}</td>
                <td>{{ $doctor->specialty->name }}</td>
                <td>{{ $doctor->user->email }}</td>
                <td>
                    <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este médico?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
