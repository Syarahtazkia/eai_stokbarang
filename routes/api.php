<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataBarangController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/databarang', [DataBarangController::class,'index']);
Route::post('/databarang', [DataBarangController::class,'store']);
Route::get('/databarang/{DataBarang:id}', [DataBarangController::class,'show']);
Route::delete('/databarang/{DataBarang:id}', [DataBarangController::class,'destroy']);
Route::put('/databarang/{DataBarang:id}', [DataBarangController::class,'update']);