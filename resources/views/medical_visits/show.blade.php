@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-header">
                <h2>Detalles de la Visita Médica</h2>
            </div>
            <div class="card-body">
                <!-- Mostrar detalles de la visita médica -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Doctor:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $medicalVisit->doctor->name }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Diagnóstico:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $medicalVisit->diagnosis }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Tratamiento:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $medicalVisit->treatment }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Estado:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $medicalVisit->status }}
                    </div>
                </div>

                <!-- Mostrar recetas asociadas a la visita médica -->
                <h3 class="mt-4">Prescripciones</h3>
                @if($medicalVisit->prescriptions->isEmpty())
                    <div class="alert alert-info">
                        No hay recetas para esta visita.
                    </div>
                @else
                    <ul class="list-group">
                        @foreach ($medicalVisit->prescriptions as $prescription)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-4"><strong>Medicamento:</strong></div>
                                    <div class="col-md-8">{{ $prescription->medication }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"><strong>Dosis:</strong></div>
                                    <div class="col-md-8">{{ $prescription->dosage }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"><strong>Instrucciones:</strong></div>
                                    <div class="col-md-8">{{ $prescription->instructions }}</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <!-- Botón para crear nueva receta para esta visita -->
                <a href="{{ route('prescriptions.create', ['medicalVisitId' => $medicalVisit->id]) }}" class="btn btn-primary mt-3">Crear receta</a>
            </div>
        </div>
    </div>
@endsection
