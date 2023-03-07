<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiProduk_C;
use App\Http\Controllers\ApiUser_C;

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

// Get
Route::get('/apiProduk', [ApiProduk_C::class, 'index']);
// Show
Route::get('/detailProduk/{id}', [ApiProduk_C::class, 'show']);
// Create
Route::post('/createProduk', [ApiProduk_C::class, 'store']);
// Update 
Route::put('/updateProduk/{id}', [ApiProduk_C::class, 'update']);
// Delete 
Route::delete('/deleteProduk/{id}', [ApiProduk_C::class, 'destroy']);
// Data User
Route::get('/dataUser', [ApiUser_C::class, 'index']);
// Total Data User
Route::get('/totalUser', [ApiUser_C::class, 'show']);