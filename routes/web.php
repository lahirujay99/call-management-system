<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DesignationController;
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

    // Contact Edit, Update, Delete Routes (Individual Routes)
    Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');       // Route for showing edit form data (for modal)
    Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');      // Route for updating contact
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');   // Route for deleting contact

    // Branch Routes
    Route::get('/branches', [BranchController::class, 'index'])->name('branches.index'); // Index to show form and list
    Route::post('/branches', [BranchController::class, 'store'])->name('branches.store');
    Route::get('/branches/create', [BranchController::class, 'create'])->name('branches.create'); //Keep this for redirect in controller, not directly accessed
    Route::delete('/branches/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy');
    Route::get('/branches/{branch}/edit', [BranchController::class, 'edit'])->name('branches.edit'); // For fetching data to edit modal
    Route::put('/branches/{branch}', [BranchController::class, 'update'])->name('branches.update');   // For updating branch

    // Designation Routes
    Route::get('/designation', [DesignationController::class, 'index'])->name('designation.index'); // Index to show form and list
    Route::post('/designation', [DesignationController::class, 'store'])->name('designation.store');
    Route::get('/designation/create', [DesignationController::class, 'create'])->name('designation.create'); //Keep this for redirect in controller, not directly accessed
    Route::delete('/designation/{designation}', [DesignationController::class, 'destroy'])->name('designation.destroy');
    Route::get('/designation/{designation}/edit', [DesignationController::class, 'edit'])->name('designation.edit'); // For fetching data to edit modal
    Route::put('/designation/{designation}', [DesignationController::class, 'update'])->name('designation.update');   // For updating designation

});

require __DIR__ . '/auth.php';
