<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRegistration;
use App\Http\Controllers\UserLogin;
use App\Http\Controllers\UserDashboard;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\SeekerController;

//Homepage route
Route::get('/', [UserController::class, 'showHomepage'])->name('homepage');

// Sign-up route
Route::get('/signup', [UserRegistration::class, 'showSignuppage'])->name('signup');

//post sign-up route to login page
Route::post('/signup', [UserRegistration::class, 'register']);


Route::get('/login', [UserLogin::class, 'showLoginpage'])->name('login');

Route::post('/login', [UserLogin::class, 'login']);


Route::middleware(['auth'])->group(function (){

    Route::get('/dashboard', [UserDashboard::class, 'showDashboardpage'])->name('dashboard');


    Route::get('/donor', [DonorController::class, 'showDonorRegistrationpage'])->name('donorRegistration');

    Route::post('/donor', [DonorController::class, 'registerDonor'])->name('donor.register');

    Route::get('/seeker',
    [SeekerController::class, 'showSeekerpage'])->name('seeker.register');

    Route::post('/seeker',
    [SeekerController::class, 'seeker']);

    Route::post('/search-donors', [SeekerController::class, 'searchDonors'])->name('search.donors');

});

Route::get('/donorSuccess', [DonorController::class, 'donorSuccess'])->name('donorSuccess');

Route::post('/logout', [UserLogin::class, 'logout'])->name('logout');


Route::get('/get-donors', [UserDashboard::class, 'getDonors'])->name('get.donors');