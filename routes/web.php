<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleViewController;

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
// route auth only admin
Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post:slug}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post:slug}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post:slug}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/categories/generateSlug', [CategoryController::class, 'generateSlug'])->name('categories.generateSlug');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categories/{category:slug}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category:slug}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category:slug}', [CategoryController::class, 'destroy'])->name('categories.destroy');
})->middleware(['auth', 'verified', 'role:admin']);

// route auth all
Route::middleware(['auth', 'verified', 'role:admin,writer,user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.back.dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('users', UserController::class);

Route::get('/blog', [ArticleController::class, 'index'])->name('article.index');
Route::get('/blog/categories/{slug}', [ArticleController::class, 'getArticlesByCategory'])->name('article.category');
Route::get('/blog/users/{uuid}', [ArticleController::class, 'getArticlesByUser'])->name('article.user');
Route::get('/blog/archive/{year}', [ArticleController::class, 'getArticlesByYear'])->name('article.year');
Route::get('/blog/archive/{year}/{month}', [ArticleController::class, 'getArticlesByMonth'])->name('article.month');
Route::get('/blog/{year}/{slug}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/stats/posts', [ArticleViewController::class, 'statsPerArticle']);
Route::get('/stats/posts/{slug}', [ArticleViewController::class, 'getArticleStats']);
Route::get('/stats/locations', [ArticleViewController::class, 'statsByLocation']);

Route::get('/test', function () {
    return view('test');
});

Route::get('/postview', function () {
    return view('test_post_view');
});
Route::get('/blogview', function () {
    return view('test_blog_view2');
});


Route::prefix('me')->as('me')->group(function () {
    Route::get('/', function () {
        return view('me');
    });
});


require_once __DIR__ . '/auth.php';
