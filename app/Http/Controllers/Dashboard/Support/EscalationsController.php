<?php

namespace App\Http\Controllers\Dashboard\Support;

use App\Enums\TicketStatus;
use App\Models\Support\SupportTicket;
use App\Models\System\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class EscalationsController
{
    public function index()
    {
        $tickets = SupportTicket::where('status', TicketStatus::Escalated)
            ->with(['user', 'agent'])
            ->paginate(15)
            ->withQueryString();

        return view('dashboard.support.escalations.index', compact('tickets'));
    }

    public function flagToAdmin(Request $request, $id)
    {
        $request->validate([
            'escalation_note' => 'required|string|max:1000',
        ]);

        $ticket = SupportTicket::findOrFail($id);
        $ticket->update([
            'escalation_note' => $request->input('escalation_note'),
        ]);

        $admins = User::role('admin')->get();

        foreach ($admins as $admin) {
            Notification::create([
                'user_id' => $admin->id,
                'type' => 'escalation',
                'message' => "Ticket #{$id} needs admin attention",
                'link' => route('dashboard.admin.support.tickets.details', $id),
                'is_read' => false,
            ]);
        }

        return redirect()->back()->with('success', 'Admin has been notified about the escalation.');
    }
}
