<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;
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

Route::get('/user/{user}', [UserController::class, 'show']);

Route::get('/articles/{type}', [ArticleController::class, 'index'])->name('article-index');
Route::get('/articles/{type}/{article}', [ArticleController::class, 'show'])->name('article-show');
Route::post('/articles/storeComment', [CommentController::class, 'store'])->name('store-comment');
Route::post('/articles/storeReply', [ReplyController::class, 'store'])->name('store-reply');
Route::get('/create/article', [ArticleController::class, 'create'])->middleware('auth');
Route::post('/create/article/store', [ArticleController::class, 'store'])->name('store-article');

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{news}', [NewsController::class, 'show']);

//Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
//    return view('welcome');
//})->name('welcome');
