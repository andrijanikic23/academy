<?php

use App\Http\Controllers\CoachesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SlotsController;
use Illuminate\Support\Facades\Route;

Route::view("/", "welcome")->name("welcome");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("/sessions/overview", [ProfileController::class, "logout"])->name("profile.logout");
Route::get("/profile/logged-in", function() {
   return redirect()->route("session.schedule");
})->middleware(["auth"])->name("profile.logged");

Route::controller(SlotsController::class)->group(function(){
    Route::get("/sessions", "getSessions")->name("session.schedule");
    Route::post("/sessions/booked", "booking")->name("session.booked");
    Route::post("/sessions/cancelled", "cancelling")->name("session.cancelled");
});

Route::view("/tennis-school", "tennisSchool")->name("school");

Route::view("/team", "coaches")->name("team.overview");
Route::view("/team/new-member", "newMember")->name("team.member");
Route::controller(CoachesController::class)->group(function(){
    Route::post("/team/new-member-added", "newMember")->name("team.added.member");
});





require __DIR__.'/auth.php';
