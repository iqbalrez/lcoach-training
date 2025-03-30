<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\LandingController; 
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\MeetingRequestController;
use App\Http\Controllers\Admin\CaseStudiesController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\ValuesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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
Route::post('/store-meeting-request', [LandingController::class, 'storeMeetingRequest'])->name('user.meeting-request.store');

Route::get('/who', [LandingController::class, 'who'])->name('user.landing.who');

Route::get('/what', [LandingController::class, 'what'])->name('user.landing.what.index');
Route::get('/what/{id}', [LandingController::class, 'whatDetail'])->name('user.landing.what.detail');

Route::get('/case-studies', [LandingController::class, 'caseStudies'])->name('user.landing.case-studies.index');
Route::get('/case-studies/{id}', [LandingController::class, 'caseStudiesDetail'])->name('user.landing.case-studies.detail');

Route::get('/contact', [LandingController::class, 'contact'])->name('user.landing.contact');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::post('/update', [DashboardController::class, 'update'])->name('admin.dashboard.update');
    
    Route::group(['prefix' => 'services'], function () {
        Route::get('/', [ServicesController::class, 'index'])->name('admin.services.index');
        Route::get('/create', [ServicesController::class, 'create'])->name('admin.services.create');
        Route::post('/store', [ServicesController::class, 'store'])->name('admin.services.store');
        Route::get('/edit/{id}', [ServicesController::class, 'edit'])->name('admin.services.edit');
        Route::post('/update/{id}', [ServicesController::class, 'update'])->name('admin.services.update');
        Route::delete('/destroy/{id}', [ServicesController::class, 'destroy'])->name('admin.services.destroy');
    });
    Route::group(['prefix' => 'partner'], function () {
        Route::get('/', [PartnerController::class, 'index'])->name('admin.partner.index');    
        Route::get('/create', [PartnerController::class, 'create'])->name('admin.partner.create');
        Route::post('/store', [PartnerController::class, 'store'])->name('admin.partner.store');
        Route::get('/edit/{id}', [PartnerController::class, 'edit'])->name('admin.partner.edit');
        Route::post('/update/{id}', [PartnerController::class, 'update'])->name('admin.partner.update');
        Route::delete('/destroy/{id}', [PartnerController::class, 'destroy'])->name('admin.partner.destroy');
    });
    Route::group(['prefix' => 'meeting-request'], function () {
        Route::get('/', [MeetingRequestController::class, 'index'])->name('admin.meeting-request.index');
        Route::delete('/destroy/{id}', [MeetingRequestController::class, 'destroy'])->name('admin.meeting-request.destroy');
    });
    Route::group(['prefix' => 'case-studies'], function () {
        Route::get('/', [CaseStudiesController::class, 'index'])->name('admin.case-studies.index');
        Route::get('/create', [CaseStudiesController::class, 'create'])->name('admin.case-studies.create');
        Route::post('/store', [CaseStudiesController::class, 'store'])->name('admin.case-studies.store');
        Route::get('/edit/{id}', [CaseStudiesController::class, 'edit'])->name('admin.case-studies.edit');
        Route::post('/update/{id}', [CaseStudiesController::class, 'update'])->name('admin.case-studies.update');
        Route::delete('/destroy/{id}', [CaseStudiesController::class, 'destroy'])->name('admin.case-studies.destroy');
    });
    Route::group(['prefix' => 'statistic'], function () {
        Route::get('/', [StatisticController::class, 'index'])->name('admin.statistic.index');
        Route::get('/create', [StatisticController::class, 'create'])->name('admin.statistic.create');
        Route::post('/store', [StatisticController::class, 'store'])->name('admin.statistic.store');
        Route::get('/edit/{id}', [StatisticController::class, 'edit'])->name('admin.statistic.edit');
        Route::post('/update/{id}', [StatisticController::class, 'update'])->name('admin.statistic.update');
        Route::delete('/destroy/{id}', [StatisticController::class, 'destroy'])->name('admin.statistic.destroy');
    });
    Route::group(['prefix' => 'social-media'], routes: function () {
        Route::get('/', [SocialMediaController::class, 'index'])->name('admin.social-media.index');
        Route::get('/create', [SocialMediaController::class, 'create'])->name('admin.social-media.create');
        Route::post('/store', [SocialMediaController::class, 'store'])->name('admin.social-media.store');
        Route::get('/edit/{id}', [SocialMediaController::class, 'edit'])->name('admin.social-media.edit');
        Route::post('/update/{id}', [SocialMediaController::class, 'update'])->name('admin.social-media.update');
        Route::delete('/destroy/{id}', [SocialMediaController::class, 'destroy'])->name('admin.social-media.destroy');
    });
    
    Route::group(['prefix' => 'values'], routes: function () {
        Route::get('/', [ValuesController::class, 'index'])->name('admin.values.index');
        Route::get('/create', [ValuesController::class, 'create'])->name('admin.values.create');
        Route::post('/store', [ValuesController::class, 'store'])->name('admin.values.store');
        Route::get('/edit/{id}', [ValuesController::class, 'edit'])->name('admin.values.edit');
        Route::post('/update/{id}', [ValuesController::class, 'update'])->name('admin.values.update');
        Route::delete('/destroy/{id}', [ValuesController::class, 'destroy'])->name('admin.values.destroy');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
