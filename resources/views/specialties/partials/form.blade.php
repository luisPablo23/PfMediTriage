<div class="card shadow-sm rounded-4 p-4 mb-4">
    <h4 class="mb-4">Datos de la Especialidad</h4>

    <div class="mb-3">
        <label for="name" class="form-label fw-semibold">Nombre de la Especialidad</label>
        <input type="text" name="name" id="name" class="form-control rounded-3" value="{{ old('name', $specialty->name ?? '') }}" required>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary rounded-3 px-4">Guardar</button>
    </div>
</div>
