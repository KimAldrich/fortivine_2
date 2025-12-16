@extends('layouts.app')
@section('title', 'Search — ' . e($q) . ' — FortiVine Tech')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-title">Search results for “{{ $q }}”</h1>

            @if($projects->isEmpty() && $services->isEmpty() && $pages->isEmpty())
                <p class="muted">No results found. Try different keywords (e.g., “energy”, “agriculture”, “ESG”).</p>
            @endif

            {{-- Projects --}}
            @if($projects->isNotEmpty())
                <div class="section-head">
                    <h2 class="section-title">Projects</h2>
                    <a class="link" href="/projects">See all projects</a>
                </div>

                <div class="projects-grid">
                    @foreach($projects as $p)
                        <article class="project-card">
                            <a href="{{ url('/projects/' . ($p['slug'] ?? Str::slug($p['title']))) }}" class="project-media">
                                <img class="project-thumb" src="{{ $p['cover'] ?? 'https://placehold.co/800x480?text=Project' }}"
                                    alt="{{ $p['title'] }} cover">
                                <div class="project-overlay"></div>
                            </a>
                            <div class="project-body">
                                <h3 class="project-title">
                                    <a href="{{ url('/projects/' . ($p['slug'] ?? Str::slug($p['title']))) }}">{{ $p['title'] }}</a>
                                </h3>
                                <p class="project-summary">{{ $p['summary'] ?? '' }}</p>
                                <div class="project-cta">
                                    <a class="btn btn-ghost"
                                        href="{{ url('/projects/' . ($p['slug'] ?? Str::slug($p['title']))) }}">View case study</a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif

            {{-- Services --}}
            @if($services->isNotEmpty())
                <div class="section-head" style="margin-top:1.2rem">
                    <h2 class="section-title">Services</h2>
                    <a class="link" href="/services">See all services</a>
                </div>

                <div class="grid grid-3">
                    @foreach($services as $s)
                        <article class="card service-card">
                            <a href="{{ url('/services/' . ($s['slug'] ?? Str::slug($s['title']))) }}"
                                class="service-title">{{ $s['title'] }}</a>
                            <p class="service-excerpt">{{ $s['excerpt'] ?? '' }}</p>
                            <div style="margin-top:.35rem">
                                <a class="btn btn-ghost"
                                    href="{{ url('/services/' . ($s['slug'] ?? Str::slug($s['title']))) }}">Learn more</a>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif

            {{-- Pages --}}
            @if($pages->isNotEmpty())
                <div class="section-head" style="margin-top:1.2rem">
                    <h2 class="section-title">Pages</h2>
                </div>

                <ul class="page-hits">
                    @foreach($pages as $p)
                        <li>
                            <a href="{{ $p['url'] }}" class="page-hit-title">{{ $p['title'] }}</a>
                            <div class="page-hit-sub">{{ $p['summary'] }}</div>
                        </li>
                    @endforeach
                </ul>
            @endif

        </div>
    </section>
@endsection