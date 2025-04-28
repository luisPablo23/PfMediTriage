@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Editar Especialidad</h1>

    <form action="{{ route('specialties.update', $specialty) }}" method="POST">
        @csrf
        @method('PUT')
        @include('specialties.partials.form')
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
