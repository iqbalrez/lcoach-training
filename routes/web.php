<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\LandingController; 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('user.landing.index');
Route::post('/meeting-request', [LandingController::class, 'storeMeetingRequest'])->name('user.landing.store-meeting-request');

Route::get('/who', [LandingController::class, 'who'])->name('user.landing.who');
Route::get('/what', [LandingController::class, 'what'])->name('user.landing.what');
Route::get('/case-studies', [LandingController::class, 'caseStudies'])->name('user.landing.case-studies');
Route::get('/contact', [LandingController::class, 'contact'])->name('user.landing.contact');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
