<?php
use App\Http\Controllers\ContactoController;


use Faker\Guesser\Name;
use App\Http\Controllers\SalaoAuthController;
use App\Http\Controllers\ClienteAuthController;

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('port');
});
Route::get('/dash_cliente', function () {
    return view('dash_cliente');
});

Route::get('/dash_salao', function () {
    return view('dash_saloes');
});

Route::get('/login/salao', [SalaoAuthController::class, 'mostrarFormLogin'])->name('loginSalao');
Route::post('/login/salao', [SalaoAuthController::class, 'login'])->name('dashSalao');
Route::get('/login/cliente', [ClienteAuthController::class, 'mostrarFormLogin'])->name('loginCliente');
Route::post('/login/cliente', [ClienteAuthController::class, 'login'])->name('dashCliente');

Route::get('/criar_conta', function () {
    return view('pages.create-account');
});
Route::get('/portfolio_details', function () {
    return view('portfolio_details');
});

Route::post('/', [ContactoController::class, 'enviar'])->name('enviarFbacks');
Route::get('/forgot-password', function () {
    return view('pages.forgot-password');
})->name('forgot-password');