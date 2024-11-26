<?php

namespace App\Http\Controllers;
use App\Models\Petugas;
use App\Models\Kategori;
use App\Models\Posts;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    public function index()
    {
        $posts = posts::all();
        return view('posts.index', compact('posts'));
    }

    // Menampilkan form untuk menambah post
    public function create()
    {
        $kategori = Kategori::all(); // Ambil semua kategori
        $petugas = Petugas::all(); // Ambil semua petugas

        return view('posts.create', compact('kategori', 'petugas'));
    }

    // Menyimpan post baru
    public function store(Request $request)
    {
        $data = new Posts;

        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->kategori_id = $request->kategori_id;
        $data->status = $request->status;
        $data->petugas_id = $request->petugas_id;
        $data->save();


    return redirect()->route('posts.index')->with('success', 'Post berhasil ditambahkan.');
}


    public function edit($id)
    {
        $posts = Posts::findOrFail($id); 
        $kategori = Kategori::all(); 
        $petugas = Petugas::all();

        return view('posts.edit', compact('posts', 'kategori', 'petugas'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'isi' => 'required|string',
            'status' => 'required|in:published,draft',  
        ]);

        // Mencari post berdasarkan ID
        $post = Posts::findOrFail($id);

        // Memperbarui data post
        $post->update([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'isi' => $request->isi,
            'petugas_id' => $request->petugas_id,
            'status' => $request->status,
        ]);

        // Redirect ke halaman yang diinginkan setelah update
        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui.');
    }

    // Hapus post
    public function destroy($id)
    {
        $data = Posts::find($id);
        $data->delete();
        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus.');
    }                                                                       

    // Tambahkan method baru untuk mengambil agenda
    public function getAgenda()
    {
        $agendas = Posts::where('kategori_id', 1)
                        ->where('status', 'published')
                        ->orderBy('created_at', 'desc')
                        ->take(3)
                        ->get();
        
        return $agendas;
    }
}
