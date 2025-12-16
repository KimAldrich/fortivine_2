<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Models\{Service, Project, Event};
Route::get('/sitemap.xml', function () {
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
        url('/legal/privacy')
    ];
    foreach (Service::pluck('slug') as $s)
        $urls[] = url('/services/' . $s);
    foreach (Project::pluck('slug') as $p)
        $urls[] = url('/projects/' . $p);
    foreach (Event::pluck('slug') as $e)
        $urls[] = url('/events/' . $e);
    return response()->view('sitemap.xml', compact('urls'))->header('Content-Type', 'application/xml');
})->name('sitemap.xml');