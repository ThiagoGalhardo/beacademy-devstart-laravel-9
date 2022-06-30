<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    ViaCepController
};

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
Route::get('users/notification', [UserController::class, 'notification'])->name('users.notification');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show')->where('id','[0-9]+');
Route::post('/user', [UserController::class, 'store'])->name('users.store');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// Viacep API
Route::get('viacep', [ViaCepController::class, 'index'])->name('viacep.index');
Route::post('viacep', [ViaCepController::class, 'index'])->name('viacep.index.post');
Route::get('viacep/{cep}', [ViaCepController::class, 'show'])->name('viacep.show');

