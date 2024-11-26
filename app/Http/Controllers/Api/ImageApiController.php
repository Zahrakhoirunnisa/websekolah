<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageApiController extends Controller
{
    public function upload(Request $request, Gallery $gallery)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255'
        ]);

        if ($request->hasFile('images')) {
            $uploadedImages = [];
            
            foreach ($request->file('images') as $imageFile) {
                $fileName = time() . '_' . $imageFile->getClientOriginalName();
                $imageFile->move(public_path('images'), $fileName);
                
                $image = Image::create([
                    'gallery_id' => $gallery->id,
                    'file' => 'images/' . $fileName,
                    'judul' => $request->judul
                ]);
                
                $uploadedImages[] = $image;
            }
            
            return response()->json([
                'status' => 'success',
                'message' => 'Foto berhasil ditambahkan',
                'data' => $uploadedImages
            ], 201);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Tidak ada file yang diupload'
        ], 400);
    }

    public function deleteImage(Image $image)
    {
        if (file_exists(public_path($image->file))) {
            unlink(public_path($image->file));
        }

        $image->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Foto berhasil dihapus'
        ]);
    }
} 