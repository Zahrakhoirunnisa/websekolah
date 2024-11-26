<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function show()
    {
        $beritas = Posts::where('kategori', 'berita')->latest()->get();
        return view('berita', compact('beritas'));
    }
} 