<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use Illuminate\Http\Request;

class KlubController extends Controller
{
    public function index()
    {
        $klubs = Klub::all();
        return view('klubs.index', compact('klubs'));
    }

    public function create()
    {
        return view('klubs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stadium' => 'required',
            'city' => 'required',
            'bank_account_number' => 'required',
        ]);

        Klub::create($request->all());

        return redirect()->route('klubs.index')->with('success', 'Klub berhasil ditambahkan.');
    }

    public function show(Klub $klub)
    {
        return view('klubs.show', compact('klub'));
    }

    public function edit(Klub $klub)
    {
        return view('klubs.edit', compact('klub'));
    }

    public function update(Request $request, Klub $klub)
    {
        $request->validate([
            'name' => 'required',
            'stadium' => 'required',
            'city' => 'required',
            'bank_account_number' => 'required',
        ]);

        $klub->update($request->all());

        return redirect()->route('klubs.index')->with('success', 'Klub berhasil diperbarui.');
    }

    public function destroy(Klub $klub)
    {
        $klub->delete();
        return redirect()->route('klubs.index')->with('success', 'Klub berhasil dihapus.');
    }
}
