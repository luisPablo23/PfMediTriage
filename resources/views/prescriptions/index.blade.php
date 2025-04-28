<!-- resources/views/prescriptions/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Prescriptions</h1>

        <!-- Lista de todas las recetas -->
        @if($prescriptions->isEmpty())
            <p>No prescriptions available.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Medication</th>
                        <th scope="col">Dosage</th>
                        <th scope="col">Instructions</th>
                        <th scope="col">Medical Visit</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prescriptions as $prescription)
                        <tr>
                            <td>{{ $prescription->medication }}</td>
                            <td>{{ $prescription->dosage }}</td>
                            <td>{{ $prescription->instructions }}</td>
                            <td>
                                <a href="{{ route('medical_visits.show', $prescription->medicalVisit) }}">
                                    Visit #{{ $prescription->medicalVisit->id }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('prescriptions.edit', $prescription) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('prescriptions.destroy', $prescription) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
