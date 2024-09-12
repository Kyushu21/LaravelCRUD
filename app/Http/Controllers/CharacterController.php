<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Character::paginate(5); // Usar 'characters' en plural
        return view('character.index', compact('characters'));
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('character.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos = [
            'Nombre' => 'required|string|max:100',
            'Alias' => 'required|string|max:100',
            'Edad' => 'required|integer',
            'Genero' => 'required|string|max:50',
            'Meta' => 'nullable|string|max:255',
            'Foto' => 'nullable|max:1000|mimes:jpeg,png,jpg',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'Foto.required' => 'La foto es requerida si se proporciona',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosCharacter = $request->except('_token');
        if ($request->hasFile('Foto')) {
            $datosCharacter['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Character::create($datosCharacter);

        return redirect('character/')->with('mensaje', 'Character agregado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $character = Character::findOrFail($id);
        return view('character.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $character = Character::findOrFail($id);
        return view('character.edit', compact('character'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'Nombre' => 'required|string|max:100',
            'Alias' => 'required|string|max:100',
            'Edad' => 'required|integer',
            'Genero' => 'required|string|max:50',
            'Meta' => 'nullable|string|max:255',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'Foto.required' => 'La foto es requerida si se proporciona',
        ];

        if ($request->hasFile('Foto')) {
            $campos['Foto'] = 'nullable|max:1000|mimes:jpeg,png,jpg';
            $mensaje['Foto.required'] = 'La foto es requerida si se proporciona';
        }

        $this->validate($request, $campos, $mensaje);

        $datosCharacter = $request->except(['_token', '_method']);

        if ($request->hasFile('Foto')) {
            $character = Character::findOrFail($id);
            Storage::delete('public/'.$character->Foto);
            $datosCharacter['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Character::where('id', $id)->update($datosCharacter);

        return redirect('character')->with('mensaje', 'Character actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $character = Character::findOrFail($id);
        if (Storage::delete('public/'.$character->Foto)) {
            Character::destroy($id);
        }
        
        return redirect('character')->with('mensaje', 'Character eliminado con éxito');
    }
}
