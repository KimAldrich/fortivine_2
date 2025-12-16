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

        // If you have models, use them; otherwise we fall back to the demo collections below.
        $projects = collect();
        $services = collect();

        // Projects (optional Eloquent)
        if (class_exists(\App\Models\Project::class)) {
            $projects = \App\Models\Project::query()
                ->where(
                    fn($q2) =>
                    $q2->where('title', 'like', "%{$q}%")
                        ->orWhere('summary', 'like', "%{$q}%")
                )
                ->select(['id', 'title', 'cover', 'summary', 'slug'])
                ->latest()->limit(12)->get();
        } else {
            // Demo data – same style as the portfolio page placeholders
            $seed = collect([
                ['title' => 'GridSense: Energy Optimization Suite', 'cover' => 'https://images.unsplash.com/photo-1558443957-d056622df610?q=80&w=1600&auto=format&fit=crop', 'summary' => 'Demand forecasting + alerts', 'slug' => 'gridsense'],
                ['title' => 'AgriFlow: Precision Irrigation', 'cover' => 'https://images.unsplash.com/photo-1500937386664-56f3d84bd6f5?q=80&w=1600&auto=format&fit=crop', 'summary' => 'Telemetry + models', 'slug' => 'agriflow'],
                ['title' => 'CivicSight: Pollution Insights', 'cover' => 'https://images.unsplash.com/photo-1542282088-72c9c27ed0cd?q=80&w=1600&auto=format&fit=crop', 'summary' => 'PM2.5 hotspots', 'slug' => 'civicsight'],
            ]);
            $projects = $seed->filter(
                fn($p) =>
                Str::contains(Str::lower($p['title'] . ' ' . $p['summary']), Str::lower($q))
            );
        }

        // Services (optional Eloquent)
        if (class_exists(\App\Models\Service::class)) {
            $services = \App\Models\Service::query()
                ->where(
                    fn($q2) =>
                    $q2->where('title', 'like', "%{$q}%")
                        ->orWhere('excerpt', 'like', "%{$q}%")
                )
                ->select(['id', 'title', 'excerpt', 'slug'])
                ->orderBy('title')->get();
        } else {
            $svcSeed = collect([
                ['title' => 'Energy-Efficient Software Solutions', 'excerpt' => 'Energy monitoring and optimization', 'slug' => 'energy-efficiency'],
                ['title' => 'Agricultural Software for Waste Reduction', 'excerpt' => 'Data-driven farm management', 'slug' => 'agri-waste'],
                ['title' => 'ESG Analytics & Reporting', 'excerpt' => 'Real-time footprint analytics', 'slug' => 'esg-analytics'],
            ]);
            $services = $svcSeed->filter(
                fn($s) =>
                Str::contains(Str::lower($s['title'] . ' ' . $s['excerpt']), Str::lower($q))
            );
        }

        // Simple static pages (optional)
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
