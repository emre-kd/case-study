<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $categories = Category::all();
    $posts = Post::all();

    return view('welcome', compact('categories' , 'posts'));
});


Route::get('/post/show-user/{id}', function ($id) {

    $categories = Category::all();
    $posts = Post::all();

    $post = Post::where('id', $id)->first();


    return view('show_post_details', compact('categories' , 'posts' , 'post'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth' , 'prefix' => 'admin'], function () {


    Route::resource('categories', 'App\Http\Controllers\CategoryController');
    Route::resource('posts', 'App\Http\Controllers\PostController');


});
