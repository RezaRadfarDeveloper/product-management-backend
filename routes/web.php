<?php

use App\Http\Controllers\ProductController;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products/{product}' , [ProductController::class,'show']);
Route::get('/products' , [ProductController::class,'index']);
Route::post('/products' , [ProductController::class,'store']);
Route::put('/products/{product}' , [ProductController::class,'update']);
Route::delete('/products/{product}' , [ProductController::class,'destroy']);

Route::get('/categories', function () {

    $categories = Category::orderBy('name')->get();
    return CategoryResource::collection($categories);
});
