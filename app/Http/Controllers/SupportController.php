<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function index()
    {
        return view('support.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:120',
            'company'=>'nullable|string|max:160',
            'email'=>'required|email',
            'subject'=>'required|string|max:160',
            'message'=>'required|string|min:10',
        ]);

        Mail::raw("Support ticket from {$data['name']} ({$data['email']})\n\n{$data['message']}", function($m){
            $m->to('support@fortivinetech.com')->subject('New Support Ticket');
        });

        return back()->with('success','Your support ticket was submitted. We’ll reply within 24h.');
    }
}
