<!-- resources/views/medical_visits/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Visita médica</h1>
        <form action="{{ route('medical_visits.store') }}" method="POST">
            @include('medical_visits.partials.form', ['triageEntries' => $triageEntries, 'doctors' => $doctors])
        </form>
    </div>
@endsection
