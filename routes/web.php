<?php

use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\ElectionController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

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
    Route::get('/dashboard', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/election', [\App\Http\Controllers\User\ElectionController::class, 'index'])->name('election.index');
    Route::get('/election/{id}', [\App\Http\Controllers\User\ElectionController::class, 'show'])->name('election.show');
    Route::get('/election/{id}/result', [\App\Http\Controllers\User\ResultController::class, 'index'])->name('election.result');
});

// Route::artisan Call
Route::get('/artisan-call', function(){
    Artisan::call('storage:link'); //storage:link
    Artisan::call('route:clear'); //route:clear
    Artisan::call('config:clear'); //config:clear
    return 'success';
});

Route::get('/hash-password', function() {
    Artisan::call('user:hash-user-passwords');
    return 'success';
});