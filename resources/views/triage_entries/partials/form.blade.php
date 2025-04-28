<!-- resources/views/triage_entries/partials/form.blade.php -->

<!-- Card de búsqueda de paciente (solo en Create) -->
@if(Route::currentRouteName() === 'triage_entries.create')
<div class="card mb-4 shadow-sm rounded-4">
    <div class="card-body">
        <h5 class="card-title mb-3 fw-bold">Buscar Paciente</h5>

        <div class="row g-2 align-items-end">
            <div class="col-md-6">
                <label for="identification_number" class="form-label">Número de Identificación</label>
                <input type="text" name="identification_number" id="identification_number" class="form-control rounded-3" placeholder="Ingrese N° de documento..." required>
            </div>
            <div class="col-md-3">
                <button type="button" id="search-patient" class="btn btn-secondary w-100">Buscar</button>
            </div>
        </div>

        <div class="row mt-3" id="patient-info" style="display: none;">
            <div class="col-md-12">
                <label for="patient_name" class="form-label">Nombre del Paciente</label>
                <input type="text" id="patient_name" class="form-control rounded-3" readonly>
                <input type="hidden" name="patient_id" id="patient_id">
            </div>
        </div>
    </div>
</div>
@endif

<!-- Campos de triaje -->
<div class="card mb-4 shadow-sm rounded-4">
    <div class="card-body">
        <h5 class="card-title mb-3 fw-bold">Datos del Triaje</h5>

        <div class="row g-3">
            <div class="col-md-4">
                <label for="heart_rate" class="form-label">Frecuencia Cardíaca (lpm)</label>
                <input type="number" name="heart_rate" id="heart_rate" class="form-control rounded-3" min="0" value="{{ old('heart_rate', $triageEntry->heart_rate ?? '') }}">
            </div>

            <div class="col-md-4">
                <label for="blood_pressure" class="form-label">Presión Arterial (mmHg)</label>
                <input type="text" name="blood_pressure" id="blood_pressure" class="form-control rounded-3" placeholder="Ej: 120/80" value="{{ old('blood_pressure', $triageEntry->blood_pressure ?? '') }}">
            </div>

            <div class="col-md-4">
                <label for="temperature" class="form-label">Temperatura (°C)</label>
                <input type="number" step="0.1" name="temperature" id="temperature" class="form-control rounded-3" min="30" max="45" value="{{ old('temperature', $triageEntry->temperature ?? '') }}">
            </div>

            <div class="col-md-4">
                <label for="oxygen_saturation" class="form-label">Saturación de Oxígeno (%)</label>
                <input type="number" step="0.1" name="oxygen_saturation" id="oxygen_saturation" class="form-control rounded-3" min="0" max="100" value="{{ old('oxygen_saturation', $triageEntry->oxygen_saturation ?? '') }}">
            </div>

            <div class="col-md-4">
                <label for="respiratory_rate" class="form-label">Frecuencia Respiratoria (rpm)</label>
                <input type="number" name="respiratory_rate" id="respiratory_rate" class="form-control rounded-3" min="0" value="{{ old('respiratory_rate', $triageEntry->respiratory_rate ?? '') }}">
            </div>

            <div class="col-md-4">
                <label for="priority" class="form-label">Prioridad</label>
                <select name="priority" id="priority" class="form-select rounded-3" required>
                    <option value="">Seleccione Prioridad</option>
                    @foreach(['red' => 'Rojo', 'yellow' => 'Amarillo', 'green' => 'Verde', 'blue' => 'Azul', 'black' => 'Negro'] as $key => $label)
                        <option value="{{ $key }}" {{ old('priority', $triageEntry->priority ?? '') === $key ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <label for="symptoms" class="form-label">Síntomas</label>
                <textarea name="symptoms" id="symptoms" class="form-control rounded-3" rows="3" required>{{ old('symptoms', $triageEntry->symptoms ?? '') }}</textarea>
            </div>

            <div class="col-12">
                <label for="notes" class="form-label">Notas Adicionales</label>
                <textarea name="notes" id="notes" class="form-control rounded-3" rows="3">{{ old('notes', $triageEntry->notes ?? '') }}</textarea>
            </div>
        </div>
    </div>
</div>
