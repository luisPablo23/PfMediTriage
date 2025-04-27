<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Logo del Sistema (Opcional) -->
        <div class="flex justify-center mb-6">
            <x-application-logo class="w-20 h-20 text-indigo-600" />
            <h1 class="text-2xl font-bold ml-3 self-center">MEDITRIAJE</h1>
        </div>

        <!-- Nombre Completo -->
        <div>
            <x-input-label for="name" :value="__('Nombre Completo')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Correo Electrónico -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo Electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Rol en el Sistema -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('¿Cuál es tu rol?')" />
            <select id="role" name="role" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                <option value="" disabled selected>{{ __('Selecciona tu rol') }}</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="doctor" {{ old('role') == 'doctor' ? 'selected' : '' }}>Médico</option>
                <option value="nurse" {{ old('role') == 'nurse' ? 'selected' : '' }}>Enfermero/a</option>
                <option value="receptionist" {{ old('role') == 'receptionist' ? 'selected' : '' }}>Recepcionista</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Términos y Condiciones (Opcional) -->
        <div class="block mt-4">
            <label for="terms" class="inline-flex items-center">
                <input id="terms" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="terms" required>
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Acepto los <a href="#" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">términos y condiciones</a></span>
            </label>
        </div>

        <!-- Botón de Registro -->
        <div class="flex items-center justify-between mt-6">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button class="ms-4 bg-indigo-600 hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500">
                {{ __('Registrarse') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>