<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\BallotController;

Route::get('/', [TemplateController::class, 'index']);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::middleware(['auth'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



Route::post('/logout', function () {
    Auth::logout(); 
    return redirect('/'); 
})->name('logout');

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Election Management Routes
    Route::get('/elections', [ElectionController::class, 'index'])->name('elections.index');
    Route::get('/elections/create', [ElectionController::class, 'create'])
    ->name('elections.create')
    ->middleware('auth');
    Route::post('/elections', [ElectionController::class, 'store'])->name('elections.store');


    



    // Candidate Routes
    Route::get('/candidates/create', [CandidateController::class, 'create'])->name('candidates.create');
    Route::post('/candidates', [CandidateController::class, 'store'])->name('candidates.store');

    // Ballot Routes
    Route::get('/ballots/create', [BallotController::class, 'create'])->name('ballots.create');
    Route::post('/ballots', [BallotController::class, 'store'])->name('ballots.store');
    
    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});