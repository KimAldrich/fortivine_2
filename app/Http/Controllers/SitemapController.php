<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function page()
    {
        return view('sitemap.page');
    }

    public function xml()
    {
        $urls = [
            url('/'),
            url('/about'),
            url('/services'),
            url('/projects'),
            url('/testimonials'),
            url('/partners'),
            url('/events'),
            url('/customer-service'),
            url('/contact'),
            url('/awards'),
            url('/legal/terms'),
            url('/legal/privacy'),
        ];
        foreach (['agri-waste', 'energy-efficiency', 'esg-analytics'] as $s)
            $urls[] = url("/services/$s");
        foreach (['recycling-and-rewards', 'study-sphere', 'greencart', 'ecoward'] as $p)
            $urls[] = url("/projects/$p");
        foreach (['green-tech-summit', 'sustainability-hackathon', 'career-open-house'] as $e)
            $urls[] = url("/events/$e");

        return Response::view('sitemap.xml', compact('urls'))->header('Content-Type', 'application/xml');
    }
}
