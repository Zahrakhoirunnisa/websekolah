<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request, Gallery $gallery)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255'
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                // Generate nama file yang unik
                $fileName = time() . '_' . $imageFile->getClientOriginalName();
                
                // Pindahkan file ke folder public/images
                $imageFile->move(public_path('images'), $fileName);
                
                // Simpan data ke database
                Image::create([
                    'gallery_id' => $gallery->id,
                    'file' => 'images/' . $fileName,  // Simpan path relatif
                    'judul' => $request->judul
                ]);
            }
            
            return redirect()->back()->with('success', 'Foto berhasil ditambahkan');
        }

        return redirect()->back()->with('error', 'Tidak ada file yang diupload');
    }

    public function deleteImage(Image $image)
    {
        // Hapus file fisik
        if (file_exists(public_path($image->file))) {
            unlink(public_path($image->file));
        }

        // Hapus record dari database
        $image->delete();

        return redirect()->back()->with('success', 'Foto berhasil dihapus');
    }
}
