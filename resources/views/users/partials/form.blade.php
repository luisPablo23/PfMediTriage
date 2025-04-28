<div class="card shadow-sm rounded-4 p-4 mb-4">
    <h4 class="mb-4">Datos del Usuario</h4>

    <div class="mb-3">
        <label for="name" class="form-label fw-semibold">Nombre Completo</label>
        <input type="text" name="name" id="name" class="form-control rounded-3" value="{{ old('name', $user->name ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
        <input type="email" name="email" id="email" class="form-control rounded-3" value="{{ old('email', $user->email ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="role" class="form-label fw-semibold">Rol</label>
        <select name="role" id="role" class="form-select rounded-3" required>
            <option value="">Seleccione</option>
            <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>Administrador</option>
            <option value="doctor" {{ old('role', $user->role ?? '') == 'doctor' ? 'selected' : '' }}>Médico</option>
            <option value="nurse" {{ old('role', $user->role ?? '') == 'nurse' ? 'selected' : '' }}>Enfermero/a</option>
            <option value="receptionist" {{ old('role', $user->role ?? '') == 'receptionist' ? 'selected' : '' }}>Recepcionista</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label fw-semibold">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control rounded-3" {{ !isset($user) ? 'required' : '' }}>
    </div>

    @if(isset($user))
    <div class="mb-3">
        <label for="password_confirmation" class="form-label fw-semibold">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control rounded-3">
    </div>
    @endif

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary rounded-3 px-4">Guardar</button>
    </div>
</div>
