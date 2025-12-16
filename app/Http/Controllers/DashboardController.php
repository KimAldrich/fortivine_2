<?php // app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;
use App\Models\{Service, Project, Event, ContactMessage};
class DashboardController extends Controller
{
    public function __invoke()
    {
        $this->middleware('auth');
        return view('dashboard', [
            'counts' => [
                'services' => Service::count(),
                'projects' => Project::count(),
                'events' => Event::count(),
                'messages' => ContactMessage::count(),
            ]
        ]);
    }
}