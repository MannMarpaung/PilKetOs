<?php

use App\Http\Controllers\Admin\CandidateController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('admin.')->prefix('admin')->middleware('admin')->group(function() {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/candidate', CandidateController::class)->except('show');
    Route::get('/user', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('user');
});