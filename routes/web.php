<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


// testing interface
// sRoute::get('/category', function () {
//     return view('forum_user.category');
// });

Route::get('/newpost', function () {
    return view('forum_user.new_post');
});

Route::get('/view', function () {
    return view('forum_user.post_overview');
});

Route::get('/post', function () {
       return view('forum_user.post');
 });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('admin')->group(function () {
    Route::get('/dashboard/home', [App\Http\Controllers\admin\PanelDashboard::class, 'home'])->name('dashboard.home');
    Route::get('/dashboard/category/create', [App\Http\Controllers\admin\CategoryController::class, 'create'])->name('category.create');
    Route::post('/dashboard/category/create', [App\Http\Controllers\admin\CategoryController::class, 'store'])->name('category.store');
    Route::get('/dashboard/categories', [App\Http\Controllers\admin\CategoryController::class, 'index'])->name('categories');
    Route::get('/dashboard/categories/{id}', [App\Http\Controllers\admin\CategoryController::class, 'show'])->name('category.show');
    Route::get('/dashboard/categories/edit/{id}', [App\Http\Controllers\admin\CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/dashboard/categories/edit/{id}', [App\Http\Controllers\admin\CategoryController::class, 'update'])->name('category.update');
    Route::get('/dashboard/categories/delete/{id}', [App\Http\Controllers\admin\CategoryController::class, 'destroy'])->name('category.delete');

    //Forum
    Route::get('/dashboard/forum/create', [App\Http\Controllers\admin\ForumController::class, 'create'])->name('forum.create');
    Route::post('/dashboard/forum/create', [App\Http\Controllers\admin\ForumController::class, 'store'])->name('forum.store');
    Route::get('/dashboard/forums', [App\Http\Controllers\admin\ForumController::class, 'index'])->name('forums');
});
