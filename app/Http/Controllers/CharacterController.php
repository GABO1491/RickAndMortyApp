<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CharacterController extends Controller
{
    public function fetchAndSave()
    {
        $url = 'https://rickandmortyapi.com/api/character';
        $charactersFetched = 0;

        do {
            $response = Http::get($url);
            if ($response->successful()) {
                $data = $response->json();
                
                foreach ($data['results'] as $item) {
                    if ($charactersFetched >= 100) break 2; // detenemos después de 100

                    Character::updateOrCreate(
                        ['id' => $item['id']],
                        [
                            'name' => $item['name'],
                            'status' => $item['status'],
                            'species' => $item['species'],
                            'type' => $item['type'],
                            'gender' => $item['gender'],
                            'origin_name' => $item['origin']['name'],
                            'origin_url' => $item['origin']['url'],
                            'image' => $item['image']
                        ]
                    );

                    $charactersFetched++;
                }

                $url = $data['info']['next']; // sigue a la siguiente página
            } else {
                $url = null;
            }
        } while ($url && $charactersFetched < 100);

        return redirect()->route('characters.index')->with('success', 'Se han actualizado 100 personajes');
    }

    public function edit($id)
    {
        $character = Character::findOrFail($id);
        return view('characters.edit', compact('character'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'nullable|string|max:100',
            'species' => 'nullable|string|max:100',
            'type' => 'nullable|string|max:100',
            'gender' => 'nullable|string|max:100',
            'origin_name' => 'nullable|string|max:255',
            'origin_url' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
        ]);

        $character = Character::findOrFail($id);
        $character->update($request->all());

        return redirect()->route('characters.index')->with('success', 'Personaje actualizado exitosamente');
    }

    public function index()
    {
        $characters = Character::paginate(20);
        return view('characters.index', compact('characters'));
    }

    public function show($id)
    {
        $character = Character::findOrFail($id);
        return view('characters.show', compact('character'));
    }
}
