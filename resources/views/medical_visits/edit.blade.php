<!-- resources/views/medical_visits/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Visita médica</h1>
        <form action="{{ route('medical_visits.update', $medicalVisit) }}" method="POST">
            @include('medical_visits.partials.form', ['triageEntries' => $triageEntries, 'doctors' => $doctors, 'medicalVisit' => $medicalVisit])
        </form>
    </div>
@endsection
