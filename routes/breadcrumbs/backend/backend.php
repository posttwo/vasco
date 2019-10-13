<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

Breadcrumbs::for('admin.ticket.list', function ($trail) {
    $trail->push('Tickets', route('admin.ticket.list'));
});

Breadcrumbs::for('admin.ticket.create', function ($trail) {
    $trail->parent('admin.ticket.list');
    $trail->push('Create Ticket', route('admin.ticket.create'));
});

Breadcrumbs::for('admin.ticket.view', function ($trail, $ticket) {
    $trail->parent('admin.ticket.list');
    $trail->push('#' . $ticket->id . ' ' . $ticket->name, route('admin.ticket.view', $ticket->id));
});
require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
