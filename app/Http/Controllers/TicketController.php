<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function create()
    {
        return view('ticket.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'type' => 'required|in:Technical Issues,Account & Billing,Product & Service,General Inquiry,Feedback & Suggestions',
        ]);

        // Map type to connection
        $connection = match($request->type) {
            'Technical Issues' => 'tech',
            'Account & Billing' => 'billing',
            'Product & Service' => 'product',
            'General Inquiry' => 'general',
            'Feedback & Suggestions' => 'feedback',
        };

        Ticket::on($connection)->create($validated);

        return back()->with('success', 'Ticket submitted successfully!');
    }

}
