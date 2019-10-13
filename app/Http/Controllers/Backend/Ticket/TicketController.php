<?php

namespace App\Http\Controllers\Backend\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Tickets\Ticket;
use App\Models\Tickets\TicketQueue;
use Request;
use App\Http\Requests\Backend\Tickets\StoreTicket;
use Auth;

/**
 * Class DashboardController.
 */
class TicketController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tts = Ticket::with('createdBy')->with('queue')->orderBy('id', 'desc')->paginate(100);
        return view('backend.ticket.index')->with('tts', $tts);
    }

    public function view(Ticket $ticket)
    {
        $ticket->load('queue')->load('createdBy');
        return view('backend.ticket.view')->with('ticket', $ticket);
        //return $ticket;
    }

    public function create()
    {
        return view('backend.ticket.create');
    }

    public function store(StoreTicket $request)
    {
        $input = $request->validated();
        $ticket = new Ticket;
        $ticket->name = $input['name'];
        $ticket->description = $input['description'];
        $ticket->queue()->associate($input['queue']);
        $ticket->createdBy()->associate(Auth::user());
        $ticket->status = 'Openned';
        $ticket->save();

        return ['ticket' => $ticket, 'url' => 'someUrl'];
        //return $ticket;
    }

    public function searchQueues()
    {
        $string = Request::input('q');
        $queues = TicketQueue::where('name', 'like', '%' . $string . '%')->limit(100)->get();
        return $queues;
    }
}
