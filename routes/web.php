<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PageController,
    ServiceController,
    ProjectController,
    EventController,
    PartnerController,
    TestimonialController,
    ContactController,
    SupportController,
    SearchController,
    SitemapController
};

// ------------------------------
// Public Website Routes
// ------------------------------

// Home & Static Pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/awards', [PageController::class, 'awards'])->name('awards');

// Services
Route::resource('services', ServiceController::class)->only(['index', 'show']);

// Portfolio / Projects
Route::resource('projects', ProjectController::class)->only(['index', 'show']);

// Testimonials & Partners
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');

// Careers & Events
Route::resource('events', EventController::class)->only(['index', 'show']);

// Customer Service (FAQs + Support)
Route::get('/customer-service', [SupportController::class, 'index'])->name('support.index');
Route::post('/support', [SupportController::class, 'store'])->name('support.store');

// Contact Page (Inquiry Form)
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Search (Unified site search)
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Legal Pages
Route::view('/legal/terms', 'legal.terms')->name('legal.terms');
Route::view('/legal/privacy', 'legal.privacy')->name('legal.privacy');

// Sitemap
// Route::get('/sitemap', [SitemapController::class, 'page'])->name('sitemap.page');
// Route::get('/sitemap.xml', [SitemapController::class, 'xml'])->name('sitemap.xml');




Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
