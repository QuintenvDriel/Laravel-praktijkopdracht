<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonsController;
use App\Http\Controllers\AdminController;

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

Route::get('/admin', function () {
    return view('admin');
});



Auth::routes();

Route::resource('/pokemon', PokemonsController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//For logged-in users only
Route::middleware(['auth'])->group(function (){
//    Route::patch('pokemon/{pokemon.create}/create', [PokemonsController::class, 'create'])->name('pokemon.create');
    Route::resource('/profile', ProfileController::class);
    Route::resource('/pokemon', PokemonsController::class);
    Route::post('pokemon/search', [PokemonsController::class, 'search'])->name('pokemon.search');
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::put('profile/status',[ProfileController::class, 'status'])->name('profile.status');
    Route::resource('/admin', AdminController::class);
    Route::get('admin/{admin}/admin', [AdminController::class, 'admin'])->name('admin.admin');
    Route::patch('admin/{admin}/editAdmin', [AdminController::class, 'editAdmin'])->name('admin.editAdmin');

});
