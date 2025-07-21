<?php

namespace App\Http\Controllers;

use App\Models\Pemain;
use Illuminate\Http\Request;

class PemainController extends Controller
{
    public function index()
    {
        return view('pemains.index', ['pemains' => Pemain::all()]);
    }

    public function create()
    {
        return view('pemains.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'number' => 'required|numeric',
            'birthdate' => 'required|date',
            'club_id' => 'required|exists:klubs,id',
            'medical_record' => 'nullable|string',
        ]);

        Pemain::create($request->all());

        return redirect()->route('pemains.index')->with('success', 'Pemain ditambahkan');
    }

    public function show(Pemain $pemain)
    {
        return view('pemains.show', compact('pemain'));
    }

    public function edit(Pemain $pemain)
    {
        return view('pemains.edit', compact('pemain'));
    }

    public function update(Request $request, Pemain $pemain)
    {
        $pemain->update($request->all());

        return redirect()->route('pemains.index')->with('success', 'Pemain diperbarui');
    }

    public function destroy(Pemain $pemain)
    {
        $pemain->delete();

        return redirect()->route('pemains.index')->with('success', 'Pemain dihapus');
    }
}
