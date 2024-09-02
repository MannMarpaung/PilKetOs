<?php

use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\ElectionCandidateController;
use App\Http\Controllers\Admin\ElectionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('admin.')->prefix('admin')->middleware('admin')->group(function() {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/candidate', CandidateController::class);
    Route::resource('/election', ElectionController::class)->except('show');
    Route::resource('/election_candidate', ElectionCandidateController::class);
    Route::get('/user', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('user');
});