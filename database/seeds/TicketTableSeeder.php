<?php

use App\Models\Tickets\TicketQueue;
use Illuminate\Database\Seeder;
use App\Models\Auth\User;
use App\Models\Tickets\Ticket;
/**
 * Class UserTableSeeder.
 */
class TicketTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        $queue = TicketQueue::create([
            'name' => 'Default Queue'
        ]);

        $user = User::first();

        $ticket = new Ticket;
        $ticket->name = 'Default Ticket';
        $ticket->description = 'Description';
        $ticket->status = 'Closed';
        $ticket->createdBy()->associate($user);
        $ticket->queue()->associate($queue);
        $ticket->save();

        $this->enableForeignKeys();
    }
}
