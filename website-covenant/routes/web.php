<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\GalleriController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\SupporterController;
use App\Http\Controllers\VolunteerController;
use App\Models\Sponsor;
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

//end

//galleri route
Route::post('/image-compress', [GalleriController::class, 'compressImage']);

//volunteer route
Route::get('volunteer', [VolunteerController::class, 'index']);
Route::get('volunteer/{id}/show', [VolunteerController::class, 'show']);
Route::post('volunteer', [VolunteerController::class, 'store']);
Route::post('volunteer/{id}', [VolunteerController::class, 'edit']);
Route::delete('volunteer/{id}', [VolunteerController::class, 'destroy']);

//sponsor route
Route::get('sponsor', [SponsorController::class, 'index']);
Route::get('sponsor/{id}/show', [SponsorController::class, 'show']);
Route::post('sponsor', [SponsorController::class, 'store']);
Route::post('sponsor/{id}', [SponsorController::class, 'edit']);
Route::delete('sponsor/{id}', [SponsorController::class, 'destroy']);

//kegiatan route
Route::get('kegiatan', [KegiatanController::class, 'index']);
Route::get('kegiatan/{id}/show', [KegiatanController::class, 'show']);
Route::post('kegiatan', [KegiatanController::class, 'store']);
Route::post('kegiatan/{id}', [KegiatanController::class, 'edit']);
Route::delete('kegiatan/{id}', [KegiatanController::class, 'destroy']);