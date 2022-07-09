<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
Route::resource('post', 'PostController');
// Route::get('/post', [PostController::class, 'index']);

Route::get('/vue', function () {
    return view('index');
});
Route::get('/products', function () {
    return view('product');
});
Route::get('/login', function () {
    return view('index');
});

// Route::view('/{any}', 'product')
//     ->where('any', '.*');
