<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use App\Models\{Service, Project, Event};

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
        foreach (Service::pluck('slug') as $s)
            $urls[] = url("/services/$s");
        foreach (Project::pluck('slug') as $p)
            $urls[] = url("/projects/$p");
        foreach (Event::pluck('slug') as $e)
            $urls[] = url("/events/$e");

        return Response::view('sitemap.xml', compact('urls'))->header('Content-Type', 'application/xml');
    }
}
