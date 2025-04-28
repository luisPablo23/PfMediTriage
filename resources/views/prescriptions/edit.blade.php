<!-- resources/views/prescriptions/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Prescription</h1>
        <form action="{{ route('prescriptions.update', $prescription) }}" method="POST">
            @include('prescriptions.partials.form', ['medicalVisits' => $medicalVisits, 'prescription' => $prescription])
        </form>
    </div>
@endsection
