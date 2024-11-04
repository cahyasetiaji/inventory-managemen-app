<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        // Mengambil semua item dari database
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat item baru
        return view('items.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1'
        ]);

        // Menyimpan item baru ke database
        Item::create($request->all());
        return redirect()->route('items.index')->with('success', 'Item berhasil ditambahkan.');
    }

    public function edit(Item $item)
    {
        // Menampilkan form untuk mengedit item
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        // Validasi data yang diterima untuk update
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0'
        ]);

        // Memperbarui item di database
        $item->update($request->all());
        return redirect()->route('items.index')->with('success', 'Item berhasil diperbarui.');
    }

    public function destroy(Item $item)
    {
        // Menghapus item dari database
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item berhasil dihapus.');
    }
}
