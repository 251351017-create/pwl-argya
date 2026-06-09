<?php

namespace App\Http\Controllers;

use App\Models\Electronics;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ElectronicsController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $electronics = Electronics::all();
        // $electronics = [];
        // var_dump($electronics);
        return view('electronics.index', compact('electronics'));
    }

    public function create()
    {
        return view('electronics.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create electronics');

        $request->validate([
            'nama_barang' => 'required|string',
            'brand'       => 'required|string',
            'stok'        => 'required|integer',
            'harga'       => 'required|numeric',
        ]);

        Electronics::create($request->all());

        return redirect()->route('electronics.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Electronics $electronic)
    {
        return view('electronics.edit', compact('electronic'));
    }

    public function update(Request $request, Electronics $electronic)
    {
        $this->authorize('update electronics');

        $request->validate([
            'nama_barang' => 'required|string',
            'brand'       => 'required|string',
            'stok'        => 'required|integer',
            'harga'       => 'required|numeric',
        ]);

        $electronic->update($request->all());

        return redirect()->route('electronics.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Electronics $electronic)
    {
        $electronic->delete();

        return redirect()->route('electronics.index')
            ->with('success', 'Data berhasil dihapus');
    }
}