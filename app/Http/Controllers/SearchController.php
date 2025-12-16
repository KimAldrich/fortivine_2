<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = trim($request->string('q')->toString());
        abort_if($q === '', 404);

        $projects = collect([
            ['title' => 'GridSense: Energy Optimization Suite', 'cover' => 'https://images.unsplash.com/photo-1558443957-d056622df610?q=80&w=1600&auto=format&fit=crop', 'summary' => 'Demand forecasting + alerts', 'slug' => 'gridsense'],
            ['title' => 'AgriFlow: Precision Irrigation', 'cover' => 'https://images.unsplash.com/photo-1500937386664-56f3d84bd6f5?q=80&w=1600&auto=format&fit=crop', 'summary' => 'Telemetry + models', 'slug' => 'agriflow'],
            ['title' => 'CivicSight: Pollution Insights', 'cover' => 'https://images.unsplash.com/photo-1542282088-72c9c27ed0cd?q=80&w=1600&auto=format&fit=crop', 'summary' => 'PM2.5 hotspots', 'slug' => 'civicsight'],
        ])->filter(
            fn($p) =>
            Str::contains(Str::lower($p['title'] . ' ' . $p['summary']), Str::lower($q))
        );

        $services = collect([
            ['title' => 'Energy-Efficient Software Solutions', 'excerpt' => 'Energy monitoring and optimization', 'slug' => 'energy-efficiency'],
            ['title' => 'Agricultural Software for Waste Reduction', 'excerpt' => 'Data-driven farm management', 'slug' => 'agri-waste'],
            ['title' => 'ESG Analytics & Reporting', 'excerpt' => 'Real-time footprint analytics', 'slug' => 'esg-analytics'],
        ])->filter(
            fn($s) =>
            Str::contains(Str::lower($s['title'] . ' ' . $s['excerpt']), Str::lower($q))
        );

        $pages = collect([
            ['title' => 'About', 'url' => '/about', 'summary' => 'Purpose, mission, vision, founders'],
            ['title' => 'Customer Service', 'url' => '/customer-service', 'summary' => 'FAQs and support tickets'],
            ['title' => 'Contact', 'url' => '/contact', 'summary' => 'Talk to the team'],
        ])->filter(
            fn($p) =>
            Str::contains(Str::lower($p['title'] . ' ' . $p['summary']), Str::lower($q))
        );

        return view('search.index', compact('q', 'projects', 'services', 'pages'));
    }
}

