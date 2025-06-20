@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%; border-radius: 20px; background-color: #f9f9f9;">
        <div class="text-center">
            <h2 class="mb-3" style="font-family: 'Orbitron', sans-serif;">{{ $character->name }}</h2>
            <img src="{{ $character->image }}" alt="{{ $character->name }}" class="img-fluid rounded mb-3" style="max-width: 200px;">
        </div>

        <ul class="list-group list-group-flush mb-3" style="font-size: 15px;">
            <li class="list-group-item"><strong>🧬 Tipo:</strong> {{ $character->type ?: 'N/A' }}</li>
            <li class="list-group-item"><strong>⚧️ Género:</strong> {{ $character->gender }}</li>
            <li class="list-group-item"><strong>🌍 Origen:</strong> {{ $character->origin_name }}</li>
            <li class="list-group-item">
                <strong>🔗 URL de origen:</strong>
                <a href="{{ $character->origin_url }}" target="_blank">{{ $character->origin_url }}</a>
            </li>
        </ul>

        <div class="text-center mt-3">
            <div class="btnsContainer">
                <div>
                    <span>
                        <a href="{{ route('characters.index') }}" class="btn det" style="font-family: 'Orbitron', sans-serif; text-decoration: none">
                            Volver
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Tipografía Orbitron --}}
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
@endsection



