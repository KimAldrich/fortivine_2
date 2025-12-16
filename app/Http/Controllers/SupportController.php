<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function index() { $faqs = Faq::all(); return view('support.index', compact('faqs')); }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:120',
            'company'=>'nullable|string|max:160',
            'email'=>'required|email',
            'subject'=>'required|string|max:160',
            'message'=>'required|string|min:10',
        ]);
        $data['type'] = 'support';
        $data['status'] = 'new';
        $msg = ContactMessage::create($data);

        Mail::raw("Support ticket from {$msg->name} ({$msg->email})\n\n{$msg->message}", function($m){
            $m->to('support@fortivinetech.com')->subject('New Support Ticket');
        });

        return back()->with('success','Your support ticket was submitted. We’ll reply within 24h.');
    }
}
