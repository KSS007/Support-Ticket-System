<?php

use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// list of tickets
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/tickets', [AdminController::class, 'index'])->name('admin.tickets');
    Route::get('/admin/ticket/{type}/{id}', [AdminController::class, 'show'])->name('admin.ticket.view');
    Route::post('/admin/ticket/{type}/{id}/note', [AdminController::class, 'note'])->name('admin.ticket.note');
});

// create support ticket
Route::get('/', [TicketController::class, 'create']);
Route::post('/submit-support-ticket', [TicketController::class, 'store'])->name('ticket.submit');
