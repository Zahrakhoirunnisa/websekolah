<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Posts;
use Illuminate\Http\Request;

class GalleryApiController extends Controller
{
    public function index()
    {   
        $galleries = Gallery::with('images')->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $galleries
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        $gallery = Gallery::create([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Galeri foto berhasil ditambahkan',
            'data' => $gallery
        ], 201);
    }

    public function show(Gallery $gallery)
    {
        return response()->json([
            'status' => 'success',
            'data' => $gallery->load('images')
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

        return response()->json([
            'status' => 'success',
            'message' => 'Galeri berhasil diperbarui',
            'data' => $gallery
        ]);
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Galeri foto berhasil dihapus'
        ]);
    }
} 