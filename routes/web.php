<?php

use App\Http\Controllers\UrlShortnerController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::controller(UrlShortnerController::class)->group(function(){

    Route::get('generate-shorten-link', 'index')->name('generate-shorten-link.index');
    Route::post('generate-shorten-link', 'store')->name('generate-shorten-link.store');
    Route::get('{code}', 'show')->name('generate-shorten-link.show');
});

// Route::resource('generate-shorten-link', UrlShortnerController::class);
