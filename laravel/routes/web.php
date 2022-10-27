<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonsController;

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

Route::get('/profile', function (){
    return view('profile');
});

    Route::get('/pokemon', function () {
    return view('pokemon');
    });

Route::get('/teams', function () {
    return view('teams');
});



Auth::routes();
Route::resource('/pokemon', PokemonsController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//For logged-in users only
Route::middleware(['auth'])->group(function (){

Route::resource('pokemon/create', PokemonsController::class);
Route::post('pokemon/search', [PokemonsController::class, 'search'])->name('pokemon.search');
Route::get('/profile', [ProfileController::class, 'index']);

Route::put('profile/status',[ProfileController::class, 'status'])->name('profile.status');
Route::resource('layouts.edit', PokemonsController::class);
});
