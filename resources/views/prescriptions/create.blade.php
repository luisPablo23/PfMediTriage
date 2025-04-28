<!-- resources/views/prescriptions/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Prescripción</h1>
        <form action="{{ route('prescriptions.store') }}" method="POST">
            @include('prescriptions.partials.form', ['medicalVisit' => $medicalVisit])
        </form>
    </div>
@endsection
