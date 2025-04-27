@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Triaje</h1>

    <form method="POST" action="{{ route('triages.update', $triage->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="patient_id" class="form-label">Paciente</label>
            <select name="patient_id" class="form-control" required>
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}" {{ $triage->patient_id == $patient->id ? 'selected' : '' }}>
                        {{ $patient->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nurse_id" class="form-label">Enfermero</label>
            <select name="nurse_id" class="form-control" required>
                @foreach($nurses as $nurse)
                    <option value="{{ $nurse->id }}" {{ $triage->nurse_id == $nurse->id ? 'selected' : '' }}>
                        {{ $nurse->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="symptoms" class="form-label">Síntomas</label>
            <textarea name="symptoms" class="form-control" required>{{ $triage->symptoms }}</textarea>
        </div>

        <div class="mb-3">
            <label for="priority" class="form-label">Prioridad</label>
            <select name="priority" class="form-control" required>
                <option value="red" {{ $triage->priority == 'red' ? 'selected' : '' }}>Rojo</option>
                <option value="yellow" {{ $triage->priority == 'yellow' ? 'selected' : '' }}>Amarillo</option>
                <option value="green" {{ $triage->priority == 'green' ? 'selected' : '' }}>Verde</option>
                <option value="blue" {{ $triage->priority == 'blue' ? 'selected' : '' }}>Azul</option>
                <option value="black" {{ $triage->priority == 'black' ? 'selected' : '' }}>Negro</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('triages.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection