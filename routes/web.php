<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ToDoListController;
use App\Http\Controllers\UserController;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard'); })->middleware('auth');

Route::post('/todolist', [ToDoListController::class, 'store'])->middleware('auth')->name('todolist.store');

Route::get('/dashboard', [ToDoListController::class, 'index'])->middleware('auth')->name('dashboard');

Route::patch('/todolist/{todolist}', [ToDoListController::class, 'update'])->middleware('auth')->name('todolist.update');

Route::delete('/todolist/{todolist}', [ToDoListController::class, 'destroy'])->middleware('auth')->name('todolist.destroy');

Route::get('/todolist/{todolist}/edit', [ToDoListController::class, 'edit'])->middleware('auth')->name('todolist.edit');

Route::patch('/todolist/{todolist}/update-nama', [ToDoListController::class, 'updateNama'])->middleware('auth')->name('todolist.updateNama');

Route::get('/todolist/history', [ToDoListController::class, 'history'])->middleware('auth')->name('todolist.history');

Route::get('/', function () { return view('landing'); })->name('landing');

Route::get('/switch-account/{id}', [UserController::class, 'switchAccount'])->name('switch.account');

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');