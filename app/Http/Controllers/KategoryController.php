<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoryController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        $kategoris = Kategori::all();
        return view('manajemenhalaman.kategori.index', compact('kategoris'));
    }

    // Menampilkan form untuk menambah kategori
    public function create()
    {
        return view('kategori.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:kategori',
        ]);

        Kategori::create([
            'judul' => $request->judul,
        ]);

        return redirect()->route('manajemenhalaman.kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan form untuk edit kategori
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('manajemenhalaman.kategori.edit', compact('kategori'));
    }

    // Update data kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|unique:kategori,judul,'.$id,
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'judul' => $request->judul,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate.');
    }

    // Hapus kategori
    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
