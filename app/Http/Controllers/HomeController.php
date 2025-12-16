<?php // app/Http/Controllers/HomeController.php
namespace App\Http\Controllers;
use App\Models\{Service, Project, Event, Testimonial};
class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'services' => Service::limit(3)->get(),
            'projects' => Project::latest()->limit(3)->get(),
            'events' => Event::orderBy('start_at', 'desc')->limit(3)->get(),
            'quotes' => Testimonial::limit(2)->get(),
        ]);
    }
}