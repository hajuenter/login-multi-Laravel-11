<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;

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

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function(){
//route dashboard ketika yang login admin
Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
});

Route::middleware(['auth', 'role:agent'])->group(function(){
//route dashboard ketika yang login agent
Route::get('agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});

Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


