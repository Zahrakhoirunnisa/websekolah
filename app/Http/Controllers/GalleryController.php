<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Posts;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    // Index gallery
    public function index()
    {   
        $galleries = Gallery::all();

        return view('galleries.index', [
            'judul' => 'Galeri Foto',
            'galleries' => $galleries,
        ]);
    }

    // Tambah gallery
    public function create()
    {
        $posts = Posts::all();

        return view('galleries.create', [
            'judul' => 'Tambah Galeri Foto',
            'posts' => $posts,
        ]);
    }

    public function store(Request $request)
    {
        Gallery::create([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        return redirect('/galleries')->with('success', 'Galeri foto berhasil ditambahkan');
    }

    public function show(Gallery $gallery)
    {
        return view('galleries.show', [
            'judul' => 'Detail Galeri Foto',
            'gallery' => $gallery,
        ]);
    }

    public function edit(Gallery $gallery)
    {
        $posts = Posts::all();

        return view('galleries.edit', [
            'judul' => 'Edit Galeri Foto',
            'gallery' => $gallery,
            'posts' => $posts,
        ]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        $gallery->update($request->only(['post_id', 'position', 'status']));

        return redirect()->route('galleries.show', $gallery)->with('success', 'Galeri berhasil diperbarui');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return redirect('/galleries')->with('success', 'Galeri foto berhasil dihapus');
    }
}
