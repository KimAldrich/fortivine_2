<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'company' => 'nullable|string|max:160',
            'email' => 'required|email',
            'subject' => 'required|in:Sales Inquiry,Technical Support,Partnership Opportunity',
            'message' => 'required|string|min:10',
        ]);

        $recipient = in_array($data['subject'], ['Sales Inquiry', 'Partnership Opportunity'])
            ? 'inquiries@fortivinetech.com'
            : 'support@fortivinetech.com';

        Mail::raw("Inquiry from {$data['name']} ({$data['email']})\n\n{$data['message']}", function ($m) use ($recipient, $data) {
            $m->to($recipient)->subject("FortiVine Inquiry: {$data['subject']}");
        });

        return back()->with('success', 'Thanks! Your message was sent.');
    }
}
