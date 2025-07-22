<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
    {
        $keuangans = Keuangan::with('club')->latest()->get();
        return view('keuangan.index', compact('keuangans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'club_id' => 'required|exists:clubs,id',
            'transaction_date' => 'required|date',
            'type' => 'required|in:income,expense',
            'category' => 'required|string',
            'amount' => 'required|numeric',
            'description' => 'required|string',
        ]);

        Keuangan::create($request->all());

        return redirect()->back()->with('success', 'Transaksi berhasil disimpan.');
    }

    public function destroy($id)
    {
        $trx = Keuangan::findOrFail($id);
        $trx->delete();

        return redirect()->back()->with('success', 'Transaksi berhasil dihapus.');
    }
}
