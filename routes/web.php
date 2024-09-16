<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
use App\Http\Controllers\LawsuitController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DefendantController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


// Route::get('/', function () {
//     return view('homepage');
// });

Route::get('/', function () {
    return view('homepage'); 
})->name('home');


// Define the lawsuits homepage route

Route::get('/lawsuits/index', [LawsuitController::class, 'index'])->name('lawsuits.index');


Route::resource('/lawsuits',LawsuitController::class);
Route::resource('/applicants',ApplicantController::class);
Route::resource('/defendants',DefendantController::class);
Route::resource('/courts',CourtController::class);


Route::middleware(['auth'])->group(function () {
    // Routes accessible to both admins and superadmins
    Route::resource('applicants', ApplicantController::class);
    Route::resource('defendants', DefendantController::class);
    Route::resource('courts', CourtController::class);
    Route::resource('lawsuits', LawsuitController::class);
  });


  Route::get('/login', [AuthController::class, 'getLoginPage'])->name('login');
  Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.login');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

