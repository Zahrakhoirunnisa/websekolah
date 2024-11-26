<?php

namespace App\Http\Controllers;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();
        return view('manajemenadmin.index', compact('petugas'));
    }

    // Menampilkan form untuk menambah petugas
    public function create()
    {
        return view('manajemenadmin.create');
    }

    // Menyimpan petugas baru
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:petugas',
            'password' => 'required',
            'role' => 'required',
        ]);

        // Buat array data baru dengan password yang sudah di-hash
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        
        Petugas::create($data);
        return redirect()->route('manajemenadmin.index')->with('success', 'Petugas berhasil ditambahkan.');
    }

    // Menampilkan form untuk edit petugas
    public function edit($id)
    {
        $petugas = Petugas::find($id);
        return view('manajemenadmin.edit', compact('petugas'));
    }

    // Update data petugas
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|unique:petugas,username,'.$id,
            'role' => 'required',
        ]);

        $petugas = Petugas::find($id);
        $data = $request->all();
        
        // Hanya update password jika ada input password baru
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }
        
        $petugas->update($data);
        return redirect()->route('manajemenadmin.index')->with('success', 'Petugas berhasil diupdate.');
    }

    // Hapus petugas
    public function destroy($id)
    {
        Petugas::find($id)->delete();
        return redirect()->route('manajemenadmin.index')->with('success', 'Petugas berhasil dihapus.');
    }

}
