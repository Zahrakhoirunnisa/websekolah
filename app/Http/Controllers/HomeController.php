<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Image;
use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $agendas = Posts::where('kategori_id', 1)
                    ->where('status', 'published')
                    ->orderBy('created_at', 'desc')
                    ->take(3)
                    ->get();

        $beritas = Posts::where('kategori_id', 3)
                    ->where('status', 'published')
                    ->orderBy('created_at', 'desc')
                    ->take(3)
                    ->get();

        $galleries = Gallery::with(['images', 'posts'])
                    ->where('status', 'aktif')
                    ->take(6)
                    ->get();

        return view('welcome', compact('agendas', 'beritas', 'galleries'));
    }

    public function allAgenda()
    {
        $agendas = Posts::where('kategori_id', 1)
                    ->where('status', 'published')
                    ->orderBy('created_at', 'desc')
                    ->paginate(9);

        return view('agenda', compact('agendas'));
    }

    public function allGallery()
    {
        $galleries = Gallery::with('images')
                    ->paginate(12);

        return view('gallery', compact('galleries'));
    }

}
