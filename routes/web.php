<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManutencaoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VeiculoController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(VeiculoController::class)->prefix('veiculo')->name('veiculo.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/adicionar', 'adicionar')->name('adicionar');
        Route::post('/salvar', 'salvar')->name('salvar');
        Route::get('/{id}/editar', 'editar')->name('editar');
        Route::get('/{id}/visualizar', 'visualizar')->name('visualizar');
        Route::get('/{id}/excluir', 'excluir')->name('excluir');
    });

    Route::controller(ManutencaoController::class)->prefix('manutencao')->name('manutencao.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/adicionar', 'adicionar')->name('adicionar');
        Route::post('/salvar', 'salvar')->name('salvar');
        Route::get('/{id}/editar', 'editar')->name('editar');
        Route::get('/{id}/visualizar', 'visualizar')->name('visualizar');
        Route::get('/{id}/excluir', 'excluir')->name('excluir');
    });
});

require __DIR__.'/auth.php';
