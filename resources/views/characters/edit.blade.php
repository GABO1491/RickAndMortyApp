@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center align-items-start">
        {{-- Imagen tipo ficha --}}
        <div class="col-md-4 text-center">
            <div class="card shadow" style="border-radius: 15px; background-color: #1b1b1b;">
                <img src="{{ $character->image }}" alt="Imagen de {{ $character->name }}" class="img-fluid rounded-top" style="border-radius: 15px 15px 0 0;">
                <div class="card-body text-white">
                    <h5 style="font-family: 'Orbitron', sans-serif;">{{ $character->name }}</h5>
                    <p class="mb-1"><strong>Estado:</strong> {{ $character->status }}</p>
                    <p class="mb-1"><strong>Género:</strong> {{ $character->gender }}</p>
                    <p class="mb-1"><strong>Especie:</strong> {{ $character->species }}</p>
                </div>
            </div>
        </div>

        {{-- Formulario de edición --}}
        <div class="col-md-8">
            <div class="card shadow-lg p-4" style="border-radius: 15px; background-color: #f9f9f9;">
                <h2 class="text-center mb-4" style="font-family: 'Orbitron', sans-serif;">Editar personaje</h2>

                <form action="{{ route('characters.update', $character->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @foreach ([
                        'name' => '🧪 Nombre',
                        'status' => '💀 Estado',
                        'species' => '👽 Especie',
                        'type' => '🔍 Tipo',
                        'gender' => '⚧️ Género',
                        'origin_name' => '🌎 Origen (nombre)',
                        'origin_url' => '🔗 Origen (URL)',
                        'image' => '🖼️ Imagen (URL)'
                    ] as $field => $label)
                        <div class="mb-3">
                            <label class="form-label">{{ $label }}:</label>
                            <input 
                                type="text" 
                                name="{{ $field }}" 
                                class="form-control" 
                                value="{{ old($field, $character->$field) }}"
                            >
                        </div>
                    @endforeach

                    {{-- Botones --}}
                    <div class="text-center mt-4">
                        <div class="btnsContainer">
                            <span>
                                <button type="submit" class="btn gua btn-success me-2" style="background-color: transparent;">Guardar</button>
                                <a href="{{ route('characters.index') }}" class="btn can btn-secondary" style="background-color: transparent;">Cancelar</a>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Tipografía --}}
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
@endsection
