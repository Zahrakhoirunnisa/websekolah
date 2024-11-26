<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Posts;
use App\Models\Kategori;
use App\Models\Gallery;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $petugasCount = Petugas::count();
        $postsCount = Posts::count();
        $kategoryCount = Kategori::count();
        $galleryCount = Gallery::count();

        return view('admin.index', compact('petugasCount', 'postsCount', 'kategoryCount', 'galleryCount'));
    }
}


