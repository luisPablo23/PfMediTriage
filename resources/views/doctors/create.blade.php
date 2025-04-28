@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Nuevo Médico</h1>

    <form action="{{ route('doctors.store') }}" method="POST">
        @csrf
        @include('doctors.partials.form')
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
