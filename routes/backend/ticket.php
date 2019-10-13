<?php

use App\Http\Controllers\Backend\Ticket\TicketController;

// All route names are prefixed with 'admin.auth'.
Route::group([
    'prefix' => 'ticket',
    'as' => 'ticket.',
    'namespace' => 'Ticket',
    'middleware' => 'permission:'.'view tickets',
], function () {
    Route::get('/', [TicketController::class, 'index'])->name('list');
    Route::get('/create', [TicketController::class, 'create'])->name('create');
    Route::get('/searchQueue', [TicketController::class, 'searchQueues'])->name('queue.search');
    Route::get('/{ticket}', [TicketController::class, 'view'])->name('view');
    Route::post('/', [TicketController::class, 'store'])->name('store');});
