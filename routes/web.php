<?php

use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\WisataController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('user.home');

Route::get('/wisata', [WisataController::class, 'index'])->name('user.wisata.index');
Route::get('/wisata/{slug}', [WisataController::class, 'show'])->name('user.wisata.show');
Route::post('/wisata/review/{id}', [WisataController::class, 'review'])->name('user.wisata.review');

Route::get('/article', [ArticleController::class, 'index'])->name('user.article.index');
Route::get('/article/{slug}', [ArticleController::class, 'show'])->name('user.article.show');

require __DIR__.'/backend.php';
require __DIR__.'/auth.php';
