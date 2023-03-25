<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthenticationMiddleware;

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
    return redirect()->route('app.login');
});

Route::get('/login', [LoginController::class, 'index'])->name('app.login');
Route::post('/auth', [LoginController::class, 'auth'])->name('app.auth');

Route::middleware(AuthenticationMiddleware::class)->controller(UserController::class)->prefix('/user')->group(function () {

    Route::get('/main-page', [PrincipalController::class, 'index'])->name('site.mainpage');
    Route::get('/logout', [PrincipalController::class, 'logout'])->name('site.logout');
    Route::get('/novo-usuario', [PrincipalController::class, 'novoUsuario'])->name('view.novoUsuario');
    Route::get('/editar-usuario/{id}', [PrincipalController::class, 'edit'])->name('view.editar');

    Route::get('/listar', 'users')->name('site.listar');
    Route::put('/editar/{id}', 'editUser')->name('site.editar');
    Route::post('/novo', 'newUser')->name('site.novoUsuario');
    Route::delete('/delete/{id}', 'deleteUser')->name('site.deletar');
});
