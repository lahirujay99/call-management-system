<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', [ContactController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //  Contact routes:
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create'); // Route to display the form
    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');   // Route to handle form submission

    // Branch Routes
    Route::get('/branches/create', [BranchController::class, 'create'])->name('branches.create'); // Form to add new branch
    Route::post('/branches', [BranchController::class, 'store'])->name('branches.store');      // Handle branch creation

});

require __DIR__ . '/auth.php';
