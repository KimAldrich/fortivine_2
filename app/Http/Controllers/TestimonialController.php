<?php

namespace App\Http\Controllers;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = collect();
        return view('testimonials.index', compact('testimonials'));
    }
}
