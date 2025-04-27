@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Editar Paciente</h1>

    <form action="{{ route('patients.update', $patient) }}" method="POST">
        @csrf
        @method('PUT')
        @include('patients.partials.form')
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection