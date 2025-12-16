<?php // app/Http/Controllers/HomeController.php
namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'services' => collect(),
            'projects' => collect(),
            'events' => collect(),
            'quotes' => collect(),
        ]);
    }
}
