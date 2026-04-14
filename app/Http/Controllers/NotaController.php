<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Visualizza una lista delle note.
     */
    public function index()
    {
        $note = Nota::latest()->get();
        return view('note.index', compact('note'));
    }

    /**
     * Mostra il modulo per creare una nuova nota.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Salva una nuova nota nel database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titolo' => 'required|string|max:255',
            'contenuto' => 'nullable|string',
        ]);

        Nota::create($request->all());

        return redirect()->route('note.index')
            ->with('success', 'Nota creata con successo!');
    }

    /**
     * Visualizza una nota specifica.
     */
    public function show(Nota $nota)
    {
        return view('note.show', compact('nota'));
    }

    /**
     * Mostra il modulo per modificare una nota.
     */
    public function edit(Nota $nota)
    {
        return view('note.edit', compact('nota'));
    }

    /**
     * Aggiorna la nota nel database.
     */
    public function update(Request $request, Nota $nota)
    {
        $request->validate([
            'titolo' => 'required|string|max:255',
            'contenuto' => 'nullable|string',
        ]);

        $nota->update($request->all());

        return redirect()->route('note.index')
            ->with('success', 'Nota aggiornata con successo!');
    }

    /**
     * Rimuove la nota dal database.
     */
    public function destroy(Nota $nota)
    {
        $nota->delete();

        return redirect()->route('note.index')
            ->with('success', 'Nota eliminata correttamente.');
    }
}