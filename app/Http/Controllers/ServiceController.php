<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(12);
        return view('services.index', compact('services'));
    }
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }
}
