<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RegisterUser;
use App\Http\Controllers\Admin\ScheduleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.users');
    Route::get('/admin/schedule', [AdminController::class, 'Schedule'])->name('admin.schedule');
    Route::get('/admin/documents', [AdminController::class, 'Documents'])->name('admin.documents');

    Route::get('/rieltor/Card', [AdminController::class, 'Card'])->name('rieltor.card');
    Route::get('/rieltor/Client', [AdminController::class, 'Client'])->name('rieltor.Client');
    Route::get('/rieltor/MySchedule', [AdminController::class, 'MySchedule'])->name('rieltor.Myschedule');

    Route::get('/yurist/document', [AdminController::class, 'Document'])->name('Yurist.Document');
    
    Route::get('/admin/registr', [RegisterUser::class, 'showRegistrForm'])->name('admin.ShowRegistrForm');
    Route::post('/admin/registr', [RegisterUser::class, 'registr'])->name('admin.registr');

    Route::post('/schedules', [ScheduleController::class, 'Schedule'])->name('schedules.Schedule');
});