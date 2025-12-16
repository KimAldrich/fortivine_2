<?php
use Illuminate\Support\Facades\Route;

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
    foreach (['agri-waste', 'energy-efficiency', 'esg-analytics'] as $s)
        $urls[] = url('/services/' . $s);
    foreach (['recycling-and-rewards', 'study-sphere', 'greencart', 'ecoward'] as $p)
        $urls[] = url('/projects/' . $p);
    foreach (['green-tech-summit', 'sustainability-hackathon', 'career-open-house'] as $e)
        $urls[] = url('/events/' . $e);
    return response()->view('sitemap.xml', compact('urls'))->header('Content-Type', 'application/xml');
})->name('sitemap.xml');
