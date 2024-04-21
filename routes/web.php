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
// route auth only admin
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
});

// route auth all
Route::middleware(['auth', 'verified', 'role:admin,writer,user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/test', function () {
        return view('test');
    });
});

Route::get('/postview', function () {
    return view('test_post_view');
});


Route::prefix('me')->as('me')->group(function () {
    Route::get('/', function () {
        return view('me');
    });
});


require __DIR__ . '/auth.php';
