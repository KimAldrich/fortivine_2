<?php

namespace App\Http\Controllers;

class ServiceController extends Controller
{
    public function index()
    {
        $services = collect();
        return view('services.index', compact('services'));
    }
}
