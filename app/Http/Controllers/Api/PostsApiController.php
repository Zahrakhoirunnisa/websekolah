<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostsApiController extends Controller
{
    public function index()
    {
        $posts = Posts::with(['kategori', 'petugas'])->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
            'status' => 'required|in:published,draft',
            'petugas_id' => 'required|exists:petugas,id'
        ]);

        $post = Posts::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Post berhasil ditambahkan',
            'data' => $post
        ], 201);
    }

    public function show($id)
    {
        $post = Posts::with(['kategori', 'petugas'])->findOrFail($id);
        
        return response()->json([
            'status' => 'success',
            'data' => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'isi' => 'required|string',
            'status' => 'required|in:published,draft',
            'petugas_id' => 'required|exists:petugas,id'
        ]);

        $post = Posts::findOrFail($id);
        $post->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Post berhasil diperbarui',
            'data' => $post
        ]);
    }

    public function destroy($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Post berhasil dihapus'
        ]);
    }

    public function getAgenda()
    {
        $agendas = Posts::where('kategori_id', 1)
                        ->where('status', 'published')
                        ->orderBy('created_at', 'desc')
                        ->take(3)
                        ->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $agendas
        ]);
    }
} 