<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;

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

/*method 1 : Route::get('/','App\Http\Controllers\PostController@index');*/

/*method 2 : */
Route::get('/', [PostController::class , 'index'])->name('homepage');
//Route::get('/posts/{id}', [PostController::class , 'show'])->whereNumber('id');
Route::get('/articles/create', [PostController::class , 'create'])->name('createPost');
Route::post('/articles/create', [PostController::class , 'store'])->name('storePost');
Route::post('/articles/comment', [PostController::class, 'storeComment'])->name('storePostComment');
Route::get('/articles/{id}', [PostController::class , 'show'])->name('article');
Route::get('/videos', [VideoController::class , 'display'])->name('videos');
Route::get('/videos/{id}', [VideoController::class , 'show'])->name('video');
Route::post('/videos/comment', [VideoController::class, 'storeComment'])->name('storeVideoComment');
Route::get('/contact', [PostController::class , 'contact'])->name('contact');


/*
Route::get('/posts', function(){
    return response()->json(['title' => 'wtv', 'desc' => 'wtvv']);
});

Route::get('articles', function(){
    return view('articles');
});
*/
