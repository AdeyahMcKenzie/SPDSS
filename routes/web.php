<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Catalog\CatalogController;
use App\Http\Controllers\Note\NoteController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('catalog/filterForm', 'App\Http\Controllers\Catalog\CatalogController@filterForm')->name('catalog.filterForm');
Route::get('catalog/filter', 'App\Http\Controllers\Catalog\CatalogController@filter')->name('catalog.filter');

Route::resource('catalog', CatalogController::class);
Route::resource('note', NoteController::class);

require __DIR__.'/auth.php';
