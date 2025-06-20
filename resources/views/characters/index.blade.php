@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <table class="table table-bordered table-striped text-center align-middle shadow-sm">
        <thead style="background-color: #e5f7ff; font-family: 'Orbitron', sans-serif; color: #2c3e50;">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Status</th>
                <th>Especie</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($characters as $character)
                <tr >
                    <td>{{ $character->id }}</td>
                    <td>{{ $character->name }}</td>
                    <td>{{ $character->status }}</td>
                    <td>{{ $character->species }}</td>
                    <td style="background: linear-gradient(135deg, #c3f4ff, #c2ffe5);">
                        <img src="{{ $character->image }}" alt="{{ $character->name }}" width="60" class="rounded shadow-sm">
                    </td>
                    <td>
                        <div class="btnsContainer">
                            <div>
                                <a href="{{ route('characters.show', $character->id) }}" class="btn det"
                                   style="font-size: 13px; font-family: 'Orbitron', sans-serif; text-decoration: none; padding-top: 2px;">
                                    Detalles
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('characters.edit', $character->id) }}" class="btn edi"
                                   style="font-size: 13px; font-family: 'Orbitron', sans-serif; text-decoration: none; padding-top: 2px;">
                                    Editar
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

        {{-- Nueva sección para paginación dentro de la tabla --}}
        <tfoot>
            <tr>
                <td colspan="6" class="text-center p-3">
                    <div class="d-flex justify-content-center">
                        {{ $characters->links() }}
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

{{-- Estilos extra --}}
<style>
    body {
        background-color: white !important;
    }

    table img {
        transition: transform 0.2s ease;
    }

    table img:hover {
        transform: scale(1.1);
    }

    .pagination {
        font-family: 'Orbitron', sans-serif;
        margin-top: 10px;
    }

    .pagination .page-link {
        background-color: #ecfaff;
        color: #2c3e50;
        border: 1px solid #a0d6ff;
        border-radius: 8px;
        margin: 0 4px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }

    .pagination .page-item.active .page-link {
        background-color: #00ff00;
        border-color: #00ff00;
        color: #000;
        font-weight: bold;
        transform: scale(1.05);
    }

    .pagination .page-link:hover {
        background-color: #d8f0ff;
        color: #000;
    }
</style>

<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
@endsection
