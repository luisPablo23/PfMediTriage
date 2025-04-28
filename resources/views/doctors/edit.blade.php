@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Editar Médico</h1>

    <form action="{{ route('doctors.update', $doctor) }}" method="POST">
        @csrf
        @method('PUT')
        @include('doctors.partials.form')
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
