<?php

use App\Http\Controllers\TodoController;
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

Route::redirect('/', '/home', 301);

Route::middleware(['auth'])->group(function () {

    Route::get('/todo', [TodoController::class,"tampilTodo"])->name("todo.tampiltodo");
    Route::post('/todo',[TodoController::class,"tambahTodo"])->name("todo.nambahtodo");
    Route::get('/todo/delete/{id}',[TodoController::class,"hapusTodo"])->name("todo.hapustodo");
    Route::get('/todo/update/{id}',[TodoController::class,"updateTodo"])->name("todo.updatetodo");

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
