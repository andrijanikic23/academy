<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SlotsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(SlotsController::class)->group(function(){
    Route::get("/sessions", "getSessions")->name("session.schedule");
    Route::post("/sessions/booked", "booking")->name("session.booked");
    Route::post("/sessions/cancelled", "cancelling")->name("session.cancelled");
});



require __DIR__.'/auth.php';
