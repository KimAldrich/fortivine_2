<?php

namespace App\Http\Controllers;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = collect();
        return view('projects.index', compact('projects'));
    }
}
