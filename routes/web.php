<?php

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
Route::get('/in', function () {
    return view('page.login');
});
Route::get('/up', function () {
    return view('page.register');
});
Route::get('/re', function () {
    return view('page.recovery');
});
Route::get('/ve', function () {
    return view('page.verification');
});
Route::get('/admin', function () {
    return view('page.dashboard');
});
