<?php

namespace App\Http\Controllers;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = collect();
        return view('partners.index', compact('partners'));
    }
}
