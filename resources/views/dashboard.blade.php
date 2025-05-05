<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        <div class="flex justify-center space-x-4">
            <div class="card text-white bg-danger mb-3 mx-2">
            <div class="card-body text-center">
                <h5 class="card-title">Prioridad Roja</h5>
                <p class="card-text fs-4">{{ $prioritiesCount['red'] }}</p>
            </div>
            </div>
            <div class="card text-dark bg-warning mb-3 mx-2">
            <div class="card-body text-center">
                <h5 class="card-title">Prioridad Amarilla</h5>
                <p class="card-text fs-4">{{ $prioritiesCount['yellow'] }}</p>
            </div>
            </div>
            <div class="card text-white bg-success mb-3 mx-2">
            <div class="card-body text-center">
                <h5 class="card-title">Prioridad Verde</h5>
                <p class="card-text fs-4">{{ $prioritiesCount['green'] }}</p>
            </div>
            </div>
            <div class="card text-white bg-primary mb-3 mx-2">
            <div class="card-body text-center">
                <h5 class="card-title">Prioridad Azul</h5>
                <p class="card-text fs-4">{{ $prioritiesCount['blue'] }}</p>
            </div>
            </div>
            <div class="card text-white bg-dark mb-3 mx-2">
            <div class="card-body text-center">
                <h5 class="card-title">Prioridad Negra</h5>
                <p class="card-text fs-4">{{ $prioritiesCount['black'] }}</p>
            </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mt-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Pacientes Atendidos por Mes ({{ now()->year }})</h3>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-6">
            @foreach ($monthsPatients as $month => $count)
                <div class="flex flex-col items-center justify-center border border-gray-200 rounded-lg p-4 bg-gray-100 shadow-sm hover:shadow-md transition duration-200">
                <p class="text-sm font-medium text-gray-700 mb-2">{{ \Carbon\Carbon::create()->month($month)->translatedFormat('F') }}</p>
                <p class="text-2xl font-extrabold text-indigo-700">{{ $count }}</p>
                </div>
            @endforeach
            </div>
        </div>


        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Tarjeta de doctores recientes -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
            <div class="flex justify-between items-center mb-4">
            <h3 class="text-md font-semibold text-gray-700">Doctores Recientes</h3>
            <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                {{ count($latestDoctors) }} Nuevos
            </span>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-3">
            @foreach ($latestDoctors as $doctor)
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-2 text-center hover:shadow-md transition duration-200">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($doctor->user->name) }}&background=0D8ABC&color=fff"
                     class="rounded-full w-10 h-10 mx-auto mb-1 object-cover" alt="{{ $doctor->user->name }}">

                <p class="text-xs font-semibold text-gray-800 truncate">{{ $doctor->user->name }}</p>
                <p class="text-xs text-gray-500">{{ $doctor->specialty->name }}</p>
                </div>
            @endforeach
            </div>

            <div class="mt-4 text-center">
            <a href="{{ route('doctors.index') }}"
               class="inline-block bg-blue-600 text-black text-xs px-2 py-1 rounded hover:bg-blue-700 transition">
                Ver todos los doctores
            </a>
            </div>
        </div>

        </div>
    </div>
    
    </x-slot>
</x-app-layout>