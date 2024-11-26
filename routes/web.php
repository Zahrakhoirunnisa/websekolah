<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\KategoryController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\HomeController;








/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/agenda', [HomeController::class, 'agenda'])->name('agenda');
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.action');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

Route::get('/logout', function () {
    Auth::logout(); 
    return redirect('/#'); 
})->name('logout');



Route::resource('manajemenadmin', PetugasController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::get('/posts/{id}/edit', [PostsController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostsController::class, 'update'])->name('posts.update');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy'); // Corrected line
});



Route::resource('manajemenhalaman', HalamanController::class);

Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoryController::class, 'index'])->name('kategori.index');        // Menampilkan daftar informasi
    Route::get('/create', [KategoryController::class, 'create'])->name('kategori.create'); // Menampilkan form tambah informasi
    Route::post('/store', [KategoryController::class, 'store'])->name('kategori.store');   // Menyimpan informasi baru
    Route::get('/edit/{id}', [KategoryController::class, 'edit'])->name('kategori.edit');  // Menampilkan form edit informasi
    Route::put('/update/{id}', [KategoryController::class, 'update'])->name('kategori.update'); // Mengupdate informasi yang ada
    Route::delete('/destory/{id}', [KategoryController::class, 'destory'])->name('kategori.destory'); // Menghapus informasi
});


Route::resource('galleries', GalleryController::class);
Route::get('/gallery', function () {
    return view('gallery');
});

// Galleries routes
Route::delete('/galleries/delete-image/{image}', [GalleryController::class, 'deleteImage'])->name('galleries.deleteImage');

// Tambahkan route untuk upload dan hapus foto
Route::post('/galleries/{gallery}/upload', [ImageController::class, 'upload'])->name('galleries.upload');
Route::delete('/galleries/images/{image}', [ImageController::class, 'deleteImage'])->name('galleries.deleteImage');


Route::get('storage/{filename}', function ($filename) {
    $path = storage_path('app/public/' . $filename);
    
    if (file_exists($path)) {
        return response()->file($path);
    }
    
    abort(404);
});
