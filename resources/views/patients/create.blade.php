@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Nuevo Paciente</h1>

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        @include('patients.partials.form')
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection