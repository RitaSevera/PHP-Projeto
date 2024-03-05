<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbunsController;
use App\Http\Controllers\DashboardController;

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
    return view('main.home');
  })->name('home');

Route::get('home', [DashboardController::class, 'index'])->name('dashboard.view')->middleware();

Route::get('/bands/all', [BandController::class, 'allBands'])->name('band.all');
Route::get('/bands/view{id}', [BandController::class, 'viewBand'])->name('band.view');
Route::get('/bands/addBand', [BandController::class, 'addBand'])->name('band.add');
Route::post('/bands/createBand', [BandController::class, 'createBand'])->name('band.create');
Route::post('/bands/update/{id}', [BandController::class, 'updateBand'])->name('band.update');
Route::get('/bands/delete/{id}', [BandController::class, 'deleteBand'])->name('band.delete');
Route::get('/bands/{id}', [BandController::class, 'showBand'])->name('band.show');


Route::get('/albuns/all', [AlbunsController::class, 'allAlbuns'])->name('album.all');
Route::get('/albuns/view{id}', [AlbunsController::class, 'viewAlbum'])->name('album.view');
Route::get('/albuns/addBand', [AlbunsController::class, 'addAlbum'])->name('album.add');
Route::post('/albuns/createBand', [AlbunsController::class, 'createAlbum'])->name('album.create');
Route::post('/albuns/update/{id}', [AlbunsController::class, 'updateAlbum'])->name('album.update');
Route::get('/albuns/delete/{id}', [AlbunsController::class, 'deleteAlbum'])->name('album.delete');
Route::get('/albuns/{id}', [AlbunsController::class, 'showAlbum'])->name('album.show');

Route::get('/users/all', [UserController::class, 'allUsers'])->name('user.all')->middleware();
Route::get('/users/add', [UserController::class, 'addUser'])->name('user.add')->middleware();
Route::post('/users/create', [UserController::class, 'createUser'])->name('user.create')->middleware();
Route::post('/users/update', [UserController::class, 'updateUser'])->name('user.update')->middleware();
Route::get('/users/view/{id}', [UserController::class, 'viewUser'])->name('user.view')->middleware();
Route::get('/users/delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete')->middleware();

Route::fallback(function () {
    return '<h3>Ups, esta página não existe</h3>';
});
