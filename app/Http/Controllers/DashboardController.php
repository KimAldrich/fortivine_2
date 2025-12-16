<?php // app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;
class DashboardController extends Controller
{
    public function __invoke()
    {
        $this->middleware('auth');
        return view('dashboard', [
            'counts' => [
                'services' => 0,
                'projects' => 0,
                'events' => 0,
                'messages' => 0,
            ]
        ]);
    }
}
