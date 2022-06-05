<?php

use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GaleriController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\WisataController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'checkRole'])->group(function () {

    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Objek Wisata
    Route::get('/admin/object-wisata', [WisataController::class, 'index'])->name('admin.wisata.index');
    Route::get('/admin/object-wisata/add', [WisataController::class, 'create'])->name('admin.wisata.create');
    Route::post('/admin/object-wisata/add', [WisataController::class, 'store'])->name('admin.wisata.store');
    Route::get('/admin/object-wisata/edit/{id}', [WisataController::class, 'edit'])->name('admin.wisata.edit');
    Route::put('/admin/object-wisata/edit/{id}', [WisataController::class, 'update'])->name('admin.wisata.update');
    Route::delete('/admin/object-wisata/delete/{id}', [WisataController::class, 'destroy'])->name('admin.wisata.destroy');

    // Galeri Objek Wisata
    Route::get('/admin/object-wisata/galeri', [GaleriController::class, 'wisataGaleri'])->name('admin.galeri-wisata.index');
    Route::delete('/admin/object-wisata/galeri/{id}', [GaleriController::class, 'wisataGaleriDestroy'])->name('admin.galeri-wisata.destroy');

    // Artikel
    Route::get('/admin/artikel', [ArticleController::class, 'index'])->name('admin.article.index');
    Route::get('/admin/artikel/add', [ArticleController::class, 'create'])->name('admin.article.create');
    Route::post('ckeditor/upload', [ArticleController::class, 'upload'])->name('ckeditor.upload');
    Route::post('/admin/artikel/add', [ArticleController::class, 'store'])->name('admin.article.store');
    Route::get('/admin/artikel/{id}', [ArticleController::class, 'edit'])->name('admin.article.edit');
    Route::put('/admin/artikel/{id}', [ArticleController::class, 'update'])->name('admin.article.update');
    Route::delete('/admin/artikel/{id}', [ArticleController::class, 'destroy'])->name('admin.article.destroy');

    // User
    Route::get('/admin/kelola-user', [UserController::class, 'index'])->name('admin.user.index');
    Route::delete('/admin/kelola-user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    // Review
    Route::get('/admin/review', [ReviewController::class, 'index'])->name('admin.review.index');
    
});