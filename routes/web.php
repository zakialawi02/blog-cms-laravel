<?php

use App\Http\Controllers\NoteController;
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
    Route::get('/notes', [NoteController::class, 'index'])->name('notes');
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
    Route::get('/notes/edit/{Note}', [NoteController::class, 'edit'])->name('notes.edit');
    Route::put('/notes/update/{Note}', [NoteController::class, 'update'])->name('notes.update');
    Route::post('/notes/store', [NoteController::class, 'store'])->name('notes.store');
    Route::delete('/notes/destroy/{Note}', [NoteController::class, 'destroy'])->name('notes.destroy');
    Route::get('/notes/show/{Note}', [NoteController::class, 'show'])->name('notes.show');
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


Route::prefix('me')->name('me.')->group(function () {
    Route::get('/notes', [NoteController::class, 'indexme'])->name('notes');
    Route::get('/notes/show/{Note}', [NoteController::class, 'show'])->name('notes.show');
});


require __DIR__ . '/auth.php';
