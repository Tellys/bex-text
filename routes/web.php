<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\{
    Indicador\Indicador,
    Playground
};
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

Route::view('/', 'home')->name('welcome');



Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {


    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});


Route::middleware('auth')->group(function () {
    Route::view('/home', 'home')->name('home');
    Route::get('/indicador', Indicador::class)->name('indicador');

    Route::get('/playground', Playground::class)->name('playground');

    // Pedidos
    Route::get('/pedidos', \App\Http\Livewire\pedidos\Home::class)->name('pedidos');
    Route::get('/pedidos/visualizar/{pedidos_id}', \App\Http\Livewire\pedidos\Visualizar::class)->name('pedidos_visualizar');
    Route::get('/pedidos/comprar/{pedidos_id}', \App\Http\Livewire\pedidos\Comprar::class)->name('pedidos_comprar');
    Route::get("/administracao", function(){return view("livewire.administracao");})->name('administracao');
});

