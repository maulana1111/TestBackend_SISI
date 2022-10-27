<?php

use App\Http\Controllers\Distributor;
use App\Http\Controllers\DistributorProducts;
use App\Http\Controllers\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/oauth/token', [UserController::class, 'login']);
Route::post('/oauth/regist', [UserController::class, 'register']);

Route::middleware('auth:api')->group(function() {
    Route::get('/product', [Products::class, 'index']);
    Route::post('/products/add', [Products::class, 'store']);


    Route::get('/distributor', [Distributor::class, 'index']);
    Route::post('/distributors/add', [Distributor::class, 'store']);


    Route::get('/distributor-product-price', [DistributorProducts::class, 'index']);
    Route::post('/distributor-product-price/add', [DistributorProducts::class, 'store']);
});

// Route::group(['middleware'])