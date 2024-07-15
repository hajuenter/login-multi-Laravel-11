<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\PesanController;

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

Route::get('admin/profile', [AdminController::class, 'admin_profile']);

Route::post('admin_profile/update', [AdminController::class, 'admin_profile_update']);

Route::get('admin/users', [AdminController::class, 'admin_users']);

Route::get('admin/users/view/{id}', [AdminController::class, 'admin_users_view']);

Route::get('admin/users/add', [AdminController::class, 'admin_users_add']);

Route::post('admin/users/add', [AdminController::class, 'admin_users_add_post']);

Route::get('admin/users/edit/{id}', [AdminController::class, 'admin_users_edit']);
Route::post('admin/users/edit/{id}', [AdminController::class, 'admin_users_edit_post']);

Route::get('password_baru/{token}', [AdminController::class, 'set_password_baru']);

Route::post('password_baru/{token}', [AdminController::class, 'set_password_baru_post']);

Route::get('admin/pesan/compose', [PesanController::class, 'pesan_compose']);
Route::post('admin/pesan/compose_post', [PesanController::class, 'pesan_compose_post']);

Route::get('admin/pesan/kirim', [PesanController::class, 'pesan_kirim']);

Route::get('admin/pesan_kirim', [PesanController::class, 'admin_email_kirim_hapus']);

Route::get('admin/pesan/baca/{id}', [PesanController::class, 'admin_pesan_baca']);

Route::get('admin/pesan/baca_delete/{id}', [PesanController::class, 'admin_pesan_baca_hapus']);

});

Route::middleware(['auth', 'role:agent'])->group(function(){
//route dashboard ketika yang login agent
Route::get('agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});

Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


