<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/vote', function () {
    return Inertia\Inertia::render('Vote');
})->name('vote');

Route::middleware(['auth:sanctum', 'verified'])->get('/achievements', function () {
    return Inertia\Inertia::render('Achievements');
})->name('achievements');

Route::middleware(['auth:sanctum', 'verified'])->get('/rules', function () {
    return Inertia\Inertia::render('Rules');
})->name('rules');

Route::middleware(['auth:sanctum', 'verified'])->get('/cabinet', function () {
    return Inertia\Inertia::render('Cabinet');
})->name('cabinet');

Route::middleware('auth:sanctum')->get('/users', 'App\Http\Controllers\VoteController@index');

Route::middleware('auth:sanctum')->post('/votes', 'App\Http\Controllers\VoteController@store');

Route::middleware('auth:sanctum')->get('/results', 'App\Http\Controllers\VoteController@results');
