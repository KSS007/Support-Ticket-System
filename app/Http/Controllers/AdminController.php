<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index()
    {
        $allTickets = [];

        $types = [
            'Technical Issues' => 'tech',
            'Account & Billing' => 'billing',
            'Product & Service' => 'product',
            'General Inquiry' => 'general',
            'Feedback & Suggestions' => 'feedback',
        ];

        foreach ($types as $type => $connection) {
            $tickets = Ticket::on($connection)->get()->map(function ($ticket) use ($type) {
                $ticket->source = $type;
                return $ticket;
            });

            $allTickets = array_merge($allTickets, $tickets->toArray());
        }

        return view('admin.tickets.index', compact('allTickets'));
    }

    public function show($type, $id)
    {
        $connection = $this->resolveConnection($type);
        $ticket = Ticket::on($connection)->findOrFail($id);

        return view('admin.tickets.view', compact('ticket', 'type'));
    }

    public function note(Request $request, $type, $id)
    {
        $connection = $this->resolveConnection($type);

        $ticket = Ticket::on($connection)->findOrFail($id);
        $ticket->note = $request->note;
        $ticket->status = 'Noted';
        $ticket->save();

        // Optionally store notes in a notes table or send email etc.

        return redirect()->route('admin.tickets')->with('success', 'Ticket marked as noted.');
    }

    private function resolveConnection($type)
    {
        return match($type) {
            'Technical Issues' => 'tech',
            'Account & Billing' => 'billing',
            'Product & Service' => 'product',
            'General Inquiry' => 'general',
            'Feedback & Suggestions' => 'feedback',
        };
    }

}
