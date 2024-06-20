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

Route::get('/home', function () {
    return view('login');
});

// Route::get('/new/dashboard', function () {
//     return view('layouts.dashboard_auth');
// });

// Route::get('/new/dashboard', function () {
//         return view('new_dashboard');
//     });

//Frontend- user app

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index']);

// Forum + Category on User_forum
Route::get('category/overview/{id}', 'App\Http\Controllers\FrontendController@categoryOverview')->name('category.overview');
Route::get('forum/overview/{id}', 'App\Http\Controllers\FrontendController@ForumOverview')->name('forum.overview');


//Discussion on User Forum
Route::get('user/discussion/create/{id}', [App\Http\Controllers\DiscussionController::class, 'create'])->name('create.discussion');
Route::post('user/discussion/create', [App\Http\Controllers\DiscussionController::class, 'store'])->name('store.discussion');
Route::get('user/discussion/{id}', [App\Http\Controllers\DiscussionController::class, 'show'])->name('topic');

Route::post('user/discussion/reply/{id}', [App\Http\Controllers\DiscussionController::class, 'reply'])->name('reply.discussion');
Route::get('user/discussion/delete/{id}', [App\Http\Controllers\DiscussionController::class, 'destroy'])->name('delete.reply');
Route::get('user/topic/delete/{id}', [App\Http\Controllers\DiscussionController::class, 'remove'])->name('delete.topic');
Route::get('user/reply/like/{id}', [App\Http\Controllers\DiscussionController::class, 'like'])->name('like.reply');
Route::get('user/reply/dislike/{id}', [App\Http\Controllers\DiscussionController::class, 'dislike'])->name('dislike.reply');

//user's profile
Route::get('user/updates', [App\Http\Controllers\UserController::class, 'update']);
Route::post('user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update.user');

Route::get('user/profile/{id}', 'App\Http\Controllers\FrontendController@profile')->name('profile.user');

//home page
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index']);
//end of Frontend- user app


//Admin Panel
Route::prefix('admin')->group(function () {
    //Route::get('/dashboard/home', [App\Http\Controllers\admin\PanelDashboard::class, 'home'])->name('dashboard.home');

    Route::get('/dashboard/home', [App\Http\Controllers\admin\PanelDashboard::class, 'home'])->name('dashboard.home');
    //Category
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
    Route::get('/dashboard/forums/{id}', [App\Http\Controllers\admin\ForumController::class, 'show'])->name('forum.show');
    Route::get('/dashboard/forums/edit/{id}', [App\Http\Controllers\admin\ForumController::class, 'edit'])->name('forum.edit');
    Route::post('/dashboard/forums/edit/{id}', [App\Http\Controllers\admin\ForumController::class, 'update'])->name('forum.update');
    Route::get('/dashboard/forums/delete/{id}', [App\Http\Controllers\admin\ForumController::class, 'destroy'])->name('forum.delete');

    //Users
    Route::get('/dashboard/users/{id}', [App\Http\Controllers\admin\PanelDashboard::class, 'show'])->name('user');
    Route::post('/dashboard/users/{id}', [App\Http\Controllers\admin\PanelDashboard::class, 'destroy'])->name('user.delete');
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
