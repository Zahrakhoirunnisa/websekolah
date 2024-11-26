<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostsApiController;
use App\Http\Controllers\Api\GalleryApiController;
use App\Http\Controllers\Api\ImageApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Posts Routes
Route::apiResource('posts', PostsApiController::class);
Route::get('agenda', [PostsApiController::class, 'getAgenda']);

// Gallery Routes
Route::apiResource('galleries', GalleryApiController::class);

// Image Routes
Route::post('galleries/{gallery}/images', [ImageApiController::class, 'upload']);
Route::delete('images/{image}', [ImageApiController::class, 'deleteImage']);
 