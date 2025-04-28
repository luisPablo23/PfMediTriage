@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Nueva Especialidad</h1>

    <form action="{{ route('specialties.store') }}" method="POST">
        @csrf
        @include('specialties.partials.form')
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
