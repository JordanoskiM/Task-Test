<?php

use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\SubscribersController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/website/{id}/posts', [PostController::class, 'showPosts'])->name('show.posts');
Route::get('/website/{websiteId}/post/{postId}', [PostController::class, 'showPostDetails'])->name('show.post.details');
Route::post('/subscribe/{websiteId}', [SubscribersController::class, 'subscribe'])->name('subscribe');
Route::get('/unsubscribe/{email}/{websiteId}', [SubscribersController::class, 'unsubscribe'])->name('unsubscribe');


Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'website', 'as' => 'website.'], function () {
        Route::get('/', [WebsiteController::class, 'index'])->name('index');
        Route::get('/{id}/delete', [WebsiteController::class, 'destroy'])->name('destroy');
        Route::post('/store', [WebsiteController::class, 'create'])->name('create');
        Route::post('/{id}/update', [WebsiteController::class, 'edit'])->name('edit');
        Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'posts', 'as' => 'post.'], function () {
            Route::get('/{websiteId}', [AdminPostController::class, 'index'])->name('index');
            Route::get('/{postId}/delete', [AdminPostController::class, 'destroy'])->name('destroy');
        Route::post('/store', [AdminPostController::class, 'create'])->name('create');
            Route::post('/{postId}/update', [AdminPostController::class, 'edit'])->name('edit');
        });
    });

});

