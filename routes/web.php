<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
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
Auth::routes(); //login/register...
Route::get('/setlocale/{locale}', [UserController::class, 'setLocale'])->name('setlocale');

/* Routes that needs authentication. Guests will be redirected to the login screen. */
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () { return view('home'); })->name('home');
    Route::get('/user', [UserController::class, 'userc'])->name('user');
    Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
    Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');
    Route::post('/todos/create', [TodoController::class, 'store'])->name('todos.store');
    Route::get('/todos/{todo}', [TodoController::class, 'show'])->name('todos.show');
    Route::post('/todos/{todo}/set_completed', [TodoController::class, 'setCompleted'])->name('todos.set_completed');
});
