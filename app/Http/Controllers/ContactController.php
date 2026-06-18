<?php

namespace App\Http\Controllers;

use App\Contracts\IEmailService;
use App\Contracts\ISupportTicketService;
use App\Enums\FaqStatus;
use App\Http\Requests\ContactFormRequest;
use App\Models\Support\Faq;

class ContactController extends Controller
{
    public function __construct(
        private readonly ISupportTicketService $supportTicketService,
        private readonly IEmailService $emailService,
    ) {}

    public function index()
    {
        $faqs = Faq::where('status', FaqStatus::Published->value)
            ->orderBy('order_index')
            ->get();

        return view('contact.index', compact('faqs'));
    }

    public function submit(ContactFormRequest $request)
    {
        $ticket = $this->supportTicketService->create(
            $request->validated(),
            auth()->id() ?? null,
        );

        $this->emailService->sendContactReply($ticket->id);

        return back()->with('success', 'Message sent! We will get back to you shortly.');
    }
}
