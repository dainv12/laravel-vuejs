<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PostController;
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

Route::post('/register','ApiUserController@register');
Route::post('/login','ApiUserController@login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user-info','ApiUserController@userInfo');
    
    Route::delete('/logout','ApiUserController@logout');
    Route::resource('post','PostController');
    
    Route::resource('products', 'ProductController');
    
});
