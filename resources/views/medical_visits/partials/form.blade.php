<!-- resources/views/partials/form.blade.php -->

@csrf
@if(isset($medicalVisit))
    @method('PATCH')
@endif

<div class="mb-3">
    <label for="triage_entry_id" class="form-label">Triaje</label>
    <select name="triage_entry_id" class="form-control" required>
        @foreach ($triageEntries as $triageEntry)
            <option value="{{ $triageEntry->id }}" 
                {{ isset($medicalVisit) && $triageEntry->id == $medicalVisit->triage_entry_id ? 'selected' : '' }}>
                {{ $triageEntry->id }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="doctor_id" class="form-label">Doctor</label>
    <select name="doctor_id" class="form-control" required>
        @foreach ($doctors as $doctor)
            <option value="{{ $doctor->id }}" 
                {{ isset($medicalVisit) && $doctor->id == $medicalVisit->doctor_id ? 'selected' : '' }}>
                {{ $doctor->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="diagnosis" class="form-label">Diagnostico</label>
    <input type="text" name="diagnosis" class="form-control" value="{{ isset($medicalVisit) ? $medicalVisit->diagnosis : old('diagnosis') }}" required>
</div>

<div class="mb-3">
    <label for="treatment" class="form-label">Tratamiendo</label>
    <input type="text" name="treatment" class="form-control" value="{{ isset($medicalVisit) ? $medicalVisit->treatment : old('treatment') }}" required>
</div>

<div class="mb-3">
    <label for="status" class="form-label">Estado</label>
    <input type="text" name="status" class="form-control" value="{{ isset($medicalVisit) ? $medicalVisit->status : old('status') }}" required>
</div>

<button type="submit" class="btn btn-primary">{{ isset($medicalVisit) ? 'Actualizar' : 'Crear Visita' }}</button>
