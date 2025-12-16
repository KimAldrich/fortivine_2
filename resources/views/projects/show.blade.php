@extends('layouts.app')
@section('title', ($project['title'] ?? 'Case Study') . ' — FortiVine Tech')

@section('content')
    <section class="section">
        <div class="container">
            <article class="case">
                <img class="case-hero" src="{{ $project['cover'] ?? 'https://placehold.co/1440x560?text=Case+Study' }}"
                    alt="">
                <h1 class="page-title">{{ $project['title'] ?? 'Case Study' }}</h1>
                <p class="lead">{{ $project['summary'] ?? 'Project overview summary goes here.' }}</p>

                <div class="grid grid-2 gap">
                    <div class="card">
                        <h3 class="section-title">Challenge</h3>
                        <p>{{ $project['challenge'] ?? 'Describe the business and environmental problem.' }}</p>
                    </div>
                    <div class="card">
                        <h3 class="section-title">Outcome</h3>
                        <p>{{ $project['outcome'] ?? 'Quantified results and user impact.' }}</p>
                    </div>
                </div>

                <div class="project-cta mt">
                    <a class="btn btn-primary" href="/contact">Talk about a similar build</a>
                </div>
            </article>
        </div>
    </section>
@endsection