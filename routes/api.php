<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/', [PlaceController::class, 'index']);

Route::middleware('api')->group(function () {
    Route::get('places/cities', [PlaceController::class, 'getRandomCities'])->name('places.random');
    Route::get('places/{fsq_id}/photos', [PlaceController::class, 'getImages'])->name('places.images');
    Route::get('places/cities/{id}', [PlaceController::class, 'getCity']);
    Route::get('categories/{category_id}/places/{city_id}', [PlaceController::class, 'getByCategory'])->name('categories.place');
    // Route::get('places/jp/{id}', [PlaceController::class, 'show'])->name('places.show');
});