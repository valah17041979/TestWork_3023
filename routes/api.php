<?php
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::resource('products', ProductController::class);


Route::resource('categories', CategoryController::class);

/*Route::group(['namespace' => 'Api', 'as' => 'api.'], function () {
    Route::resource('products',  ProductController::class);
});*/

/*Route::namespace('Api')->group(function () {
    Route::get('/products', [App\Http\Controllers\Api\ProductController::class, 'index']);
});*/

/*Route::group(['namespace' => 'Api', 'as' => 'api.'], function () {
    Route::resource('/test', 'CompaniesController', ['except' => ['create', 'edit']]);
});*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
