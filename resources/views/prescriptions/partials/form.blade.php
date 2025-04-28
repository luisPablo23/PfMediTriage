<!-- resources/views/prescriptions/partials/form.blade.php -->

@csrf
@if(isset($prescription))
    @method('PATCH')
@endif

<div class="mb-3">
    <label for="medical_visit_id" class="form-label">Visita Médica</label>
    <input type="text" name="medical_visit_id" class="form-control" value="{{ isset($prescription) ? $prescription->medical_visit_id : $medicalVisit->id }}" readonly required>
</div>

<div class="mb-3">
    <label for="medication" class="form-label">Medicamento</label>
    <input type="text" name="medication" class="form-control" value="{{ isset($prescription) ? $prescription->medication : old('medication') }}" required>
</div>

<div class="mb-3">
    <label for="dosage" class="form-label">Dosis</label>
    <input type="text" name="dosage" class="form-control" value="{{ isset($prescription) ? $prescription->dosage : old('dosage') }}" required>
</div>

<div class="mb-3">
    <label for="instructions" class="form-label">Instrucciones</label>
    <textarea name="instructions" class="form-control" rows="3" required>{{ isset($prescription) ? $prescription->instructions : old('instructions') }}</textarea>
</div>

<button type="submit" class="btn btn-primary">{{ isset($prescription) ? 'Actualizar Prescripción' : 'Crear Prescripción' }}</button>
