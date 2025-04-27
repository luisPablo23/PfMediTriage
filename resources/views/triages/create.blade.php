@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Triaje</h1>

    <form method="POST" action="{{ route('triages.store') }}">
        @csrf

        <div class="mb-3">
            <label for="patient_id" class="form-label">Paciente</label>
            <select name="patient_id" class="form-control" required>
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nurse_id" class="form-label">Enfermero</label>
            <select name="nurse_id" class="form-control" required>
                @foreach($nurses as $nurse)
                    <option value="{{ $nurse->id }}">{{ $nurse->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="symptoms" class="form-label">Síntomas</label>
            <textarea name="symptoms" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="priority" class="form-label">Prioridad</label>
            <select name="priority" class="form-control" required>
                <option value="red">Rojo</option>
                <option value="yellow">Amarillo</option>
                <option value="green">Verde</option>
                <option value="blue">Azul</option>
                <option value="black">Negro</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('triages.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection