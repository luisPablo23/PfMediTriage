@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Editar Triaje</h1>

    <form action="{{ route('triage_entries.update', $triageEntry) }}" method="POST">
        @csrf
        @method('PUT')

        @include('triage_entries.partials.form')

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success px-4">Actualizar Triaje</button>
        </div>
    </form>
</div>
@endsection
