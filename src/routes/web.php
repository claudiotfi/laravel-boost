<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Boost\UserController;
use App\Http\Controllers\Boost\RoleController;
use App\Http\Controllers\Boost\PermissionController;
use App\Http\Controllers\Boost\IpController;
use App\Http\Controllers\Boost\TimeController;

Route::middleware('auth')->prefix('boost')->group(function () {
    Route::get('/', [UserController::class, 'dashboard'])->name('boost.dashboard');
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('boost.users.index');
        Route::get('/create', [UserController::class, 'create'])->name('boost.users.create');
        Route::post('/', [UserController::class, 'store'])->name('boost.users.store');
        Route::get('/{id}', [UserController::class, 'show'])->name('boost.users.show');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('boost.users.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('boost.users.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('boost.users.destroy');
    });
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('boost.roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('boost.roles.create');
        Route::post('/', [RoleController::class, 'store'])->name('boost.roles.store');
        Route::get('/{id}', [RoleController::class, 'show'])->name('boost.roles.show');
        Route::get('/{id}/edit', [RoleController::class, 'edit'])->name('boost.roles.edit');
        Route::put('/{id}', [RoleController::class, 'update'])->name('boost.roles.update');
        Route::delete('/{id}', [RoleController::class, 'destroy'])->name('boost.roles.destroy');
    });
    Route::prefix('permissions')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('boost.permissions.index');
        Route::get('/create', [PermissionController::class, 'create'])->name('boost.permissions.create');
        Route::post('/', [PermissionController::class, 'store'])->name('boost.permissions.store');
        Route::get('/{id}/edit', [PermissionController::class, 'edit'])->name('boost.permissions.edit');
        Route::put('/{id}', [PermissionController::class, 'update'])->name('boost.permissions.update');
        Route::delete('/{id}', [PermissionController::class, 'destroy'])->name('boost.permissions.destroy');
    });
    Route::prefix('profile')->group(function () {
        Route::get('/', [UserController::class, 'editme'])->name('boost.profile.edit');
        Route::put('/', [UserController::class, 'updateme'])->name('boost.profile.update');
    });
    Route::prefix('ips')->group(function () {
        Route::get('/', [IpController::class, 'index'])->name('boost.ips.index');
        Route::get('/create', [IpController::class, 'create'])->name('boost.ips.create');
        Route::post('/', [IpController::class, 'store'])->name('boost.ips.store');
        Route::get('/{id}/edit', [IpController::class, 'edit'])->name('boost.ips.edit');
        Route::put('/{id}', [IpController::class, 'update'])->name('boost.ips.update');
        Route::delete('/{id}', [IpController::class, 'destroy'])->name('boost.ips.destroy');
    });
    Route::prefix('times')->group(function () {
        Route::get('/', [TimeController::class, 'index'])->name('boost.times.index');
        Route::get('/create', [TimeController::class, 'create'])->name('boost.times.create');
        Route::post('/', [TimeController::class, 'store'])->name('boost.times.store');
        Route::get('/{id}/edit', [TimeController::class, 'edit'])->name('boost.times.edit');
        Route::put('/{id}', [TimeController::class, 'update'])->name('boost.times.update');
        Route::delete('/{id}', [TimeController::class, 'destroy'])->name('boost.times.destroy');
    });
});

require __DIR__.'/auth.php';
