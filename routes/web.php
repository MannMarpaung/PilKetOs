<?php

use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\ElectionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\Frontend\DashboardController::class, 'index'])->name('frontend.index');
Route::get('/all-elections', [App\Http\Controllers\Frontend\DashboardController::class, 'allElections'])->name('frontend.allElections');
Route::get('/detail-election/{slug}', [App\Http\Controllers\Frontend\DashboardController::class, 'detailElection'])->name('detail.election');
Route::get('/detail-election/{slug}/detail-candidate/{id}', [App\Http\Controllers\Frontend\DashboardController::class, 'detailCandidate'])->name('detail.candidate');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('admin.')->prefix('admin')->middleware('admin')->group(function() {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/election.candidate', CandidateController::class);
    Route::resource('/election', ElectionController::class);
    Route::get('/election/{id}/result', [\App\Http\Controllers\Admin\ResultController::class, 'index'])->name('election.result');
    Route::get('/user', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('user');
});

Route::name('user.')->prefix('user')->middleware('user')->group(function() {
    Route::post('/vote/{candidateId}', [\App\Http\Controllers\User\VoteController::class, 'userVote'])->name('voting');
});