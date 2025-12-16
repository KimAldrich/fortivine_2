<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;

class PageController extends Controller
{
    public function home()
    {
        $services = Service::limit(3)->get();
        $projects = Project::latest()->limit(3)->get();
        return view('pages.home', compact('services','projects'));
    }

    public function about()  { return view('pages.about'); }
    public function awards() { return view('pages.awards'); }
}
