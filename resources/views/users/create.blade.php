@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Nuevo Usuario</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        @include('users.partials.form')
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
