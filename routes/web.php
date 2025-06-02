<?php
use App\Http\Controllers\ContactoController;


use Faker\Guesser\Name;
use App\Http\Controllers\SalaoAuthController;
use App\Http\Controllers\ClienteAuthController;
use App\Http\Controllers\ClienteController;

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('port');
})->name('inicio');
Route::get('/dash_cliente', function () {
    return view('dash_cliente');
});

Route::get('/dash_salao', function () {
    return view('dash_saloes');
});

Route::prefix('cliente')->name('cliente.')->group(function () {
    Route::post('/cadastrar', [ClienteController::class, 'cadastrar'])->name('cadastrar');
       // Dashboard do cliente (protegido por autenticação)
    Route::middleware('auth:cliente')->get('/dashboard', function(){
        return view('dash_cliente');
    })->name('dashboard');
    Route::get('/login', [ClienteController::class, 'mostrarFormLogin'])->name('formLogin');
    Route::post('/login', [ClienteController::class, 'login'])->name('login');
});

Route::get('/login/salao', [SalaoAuthController::class, 'mostrarFormLogin'])->name('loginSalao');
Route::post('/login/salao', [SalaoAuthController::class, 'login'])->name('dashSalao');

Route::get('/criar_conta', function () {
    return view('pages.create-account');
});
Route::get('/portfolio_details', function () {
    return view('portfolio_details');
});

Route::post('/enviar-feedback', [ContactoController::class, 'enviar'])->name('enviarFbacks');
Route::get('/forgot-password', function () {
    return view('pages.forgot-password');
})->name('forgot-password');