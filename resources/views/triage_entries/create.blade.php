@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Nuevo Triaje</h1>

    <form action="{{ route('triage_entries.store') }}" method="POST">
        @csrf

        @include('triage_entries.partials.form')

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary px-4">Guardar Triaje</button>
        </div>
    </form>
</div>

@if(Route::currentRouteName() === 'triage_entries.create')
<script>
    document.getElementById('search-patient').addEventListener('click', function() {
        const identificationNumber = document.getElementById('identification_number').value.trim();

        if (!identificationNumber) {
            alert('Por favor ingrese un número de identificación.');
            return;
        }

        fetch(`/patients/search?identification_number=${identificationNumber}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok: ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                const patientInfo = document.getElementById('patient-info');
                const patientNameInput = document.getElementById('patient_name');
                const patientIdInput = document.getElementById('patient_id');

                if (data.length > 0) {
                    const patient = data[0];
                    patientNameInput.value = patient.name;
                    patientIdInput.value = patient.id;
                    patientInfo.style.display = 'block';
                } else {
                    alert('No se encontró ningún paciente.');
                    patientInfo.style.display = 'none';
                    patientNameInput.value = '';
                    patientIdInput.value = '';
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                alert('Ocurrió un error al buscar el paciente: ' + error.message);
            });
    });
</script>
@endif
@endsection
