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
    Route::get('/dashboard/home', [App\Http\Controllers\admin\PanelDashboard::class, 'home']);
    Route::get('/dashboard/category/new', [App\Http\Controllers\admin\CategoryController::class, 'create'])->name('category.new');
    Route::post('/dashboard/category/new', [App\Http\Controllers\admin\CategoryController::class, 'store'])->name('category.store');
});
