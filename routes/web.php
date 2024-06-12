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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index']);

// Forum + Category on User_forum
Route::get('category/overview/{id}', 'App\Http\Controllers\FrontendController@categoryOverview')->name('category.overview');
Route::get('forum/overview/{id}', 'App\Http\Controllers\FrontendController@ForumOverview')->name('forum.overview');

// Route::get('overview', function () {
//     return view('forum_user.new_forum_overview');
// });


//Topic on User Forum
Route::get('user/discussion/create/{id}', [App\Http\Controllers\DiscussionController::class, 'create'])->name('create.discussion');
Route::post('user/discussion/create', [App\Http\Controllers\DiscussionController::class, 'store'])->name('store.discussion');
Route::get('user/discussion/{id}', [App\Http\Controllers\DiscussionController::class, 'show'])->name('topic');
Route::post('user/discussion/reply/{id}', [App\Http\Controllers\DiscussionController::class, 'reply'])->name('reply.discussion');
// Route::get('client/topic/new', 'App\Http\Controllers\TopicController@edit')->name('topic.edit');
// Route::get('client/topic/new', 'App\Http\Controllers\TopicController@edit')->name('topic.update');
// Route::get('client/topic/new', 'App\Http\Controllers\TopicController@destroy')->name('topic.delete');






// Route::get('/post', function () {
//        return view('forum_user.new_post');
//  });

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
});



