<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\StaticPageController;
use \App\Http\Controllers\PostController;

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

Route::get('/',
    [StaticPageController::class,'home'])->name('home');

Route::resource('users', UserController::class);
// GET users
// GET users/{id}
// POST
// PUT / PATCH
// DELETE
Route::get('/users/delete/{user}',[UserController::class, 'delete'])->name('users.delete');

Route::resource('posts', PostController::class);
Route::get('/posts/delete/{post}',[PostController::class, 'delete'])->name('posts.delete');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
