<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Post;
use App\Services\Newsletter;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\http\Controllers\PostCommentsController;
use Illuminate\Validation\ValidationException;

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



Route::get('/home', [PostController::class ,'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class,'show']);
Route::get('categories/{category:slug}', function (Category $category){

    return view('posts.index', [ // composer clockwork tool to fix N+1 issue
        'posts'=> $category->posts,
        // showing the current category
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('/authors/{author:username}', function (User $author){
    return view('posts.index', [ // composer clockwork tool to fix N+1 issue
        'posts'=> $author->posts
    ]);
});

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);
Route::post('newsletter', NewsletterController::class);
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('login', [SessionsController::class,'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class,'store'])->middleware('guest');
Route::post('logout', [SessionsController::class,'destroy'])->middleware('auth');
