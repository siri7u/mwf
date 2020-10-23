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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/notes/ajaxSearch', [App\Http\Controllers\NoteController::class, 'ajaxSearch'])->middleware('auth');
Route::resource('notes', \App\Http\Controllers\NoteController::class);
Route::resource('emplacements', \App\Http\Controllers\EmplacementController::class);



Auth::routes() ;
