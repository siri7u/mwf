<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return view('welcome'); })->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/notes/ajaxSearch', [App\Http\Controllers\NoteController::class, 'ajaxSearch']);
    Route::resource('notes', \App\Http\Controllers\NoteController::class);
    Route::resource('emplacements', \App\Http\Controllers\EmplacementController::class);
    Route::resource('choses', \App\Http\Controllers\ChoseController::class);
});




Auth::routes() ;
