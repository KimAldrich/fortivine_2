@extends('layouts.app')
@section('title', 'Partners — FortiVine Tech')

@section('content')
<section class="home-hero">
    <h1 class="page-title">Partner Companies</h1>

    <p class="lead">
        Our partnership with <strong>Sustainable Harvest NGO</strong> aims to distribute our resource management
        software
        to underserved farming communities, maximizing our environmental impact globally.
    </p>
</section>
<section class="section">

    <div class="container">

        <h2 class="section-title">How Partnerships Align</h2>
        <p>
            All our partners share our core value of environmental accountability and commitment to driving
            innovation
            for a
            healthier planet. These collaborations allow us to expand the reach and effectiveness of our green
            technology.
        </p>


        {{-- Key partners (static showcase) --}}
        <h2 class="section-title" style="margin-top:1.75rem;">Key Partners</h2>
        <div class="grid grid-3">
            <article class="card partner-card">
                <img class="partner-logo" src="https://placehold.co/300x120?text=Sustainable+Harvest+NGO"
                    alt="Sustainable Harvest NGO logo">
                <h3 class="partner-name">Sustainable Harvest NGO</h3>
                <p class="partner-summary">
                    A non-profit focused on empowering smallholder farmers with modern tools and training. Together we
                    deploy
                    resource planning and waste-reduction software across rural communities.
                </p>
                <a class="partner-link" href="#" aria-label="Visit Sustainable Harvest NGO (opens in new tab)"
                    target="_blank" rel="noopener">Visit</a>
            </article>

            <article class="card partner-card">
                <img class="partner-logo" src="https://placehold.co/300x120?text=Global+Renewable+Energy+Consortium"
                    alt="Global Renewable Energy Consortium logo">
                <h3 class="partner-name">Global Renewable Energy Consortium</h3>
                <p class="partner-summary">
                    An international coalition accelerating the adoption of renewables. Our software supports energy
                    monitoring,
                    forecasting, and carbon reporting for member facilities.
                </p>
                <a class="partner-link" href="#"
                    aria-label="Visit Global Renewable Energy Consortium (opens in new tab)" target="_blank"
                    rel="noopener">Visit</a>
            </article>

            <article class="card partner-card">
                <img class="partner-logo" src="https://placehold.co/300x120?text=The+Future+City+Institute"
                    alt="The Future City Institute logo">
                <h3 class="partner-name">The Future City Institute</h3>
                <p class="partner-summary">
                    A research hub for sustainable urban planning. We collaborate on data platforms that guide water
                    use, waste
                    diversion, and mobility improvements.
                </p>
                <a class="partner-link" href="#" aria-label="Visit The Future City Institute (opens in new tab)"
                    target="_blank" rel="noopener">Visit</a>
            </article>
        </div>

        {{-- Dynamic partners (from database) --}}
        @php($partners = \App\Models\Partner::all())
        @if($partners->count())
            <h2 class="section-title" style="margin-top:2rem;">All Partners</h2>
            <div class="grid grid-3">
                @foreach($partners as $p)
                    <article class="card partner-card">
                        <img class="partner-logo" src="{{ $p->logo_path ?: 'https://placehold.co/300x120?text=Partner+Logo' }}"
                            alt="{{ $p->name }} logo">
                        <h3 class="partner-name">{{ $p->name }}</h3>
                        <p class="partner-summary">{{ $p->summary }}</p>
                        @if($p->link)
                            <a class="partner-link" href="{{ $p->link }}" target="_blank" rel="noopener">Visit</a>
                        @endif
                    </article>
                @endforeach
            </div>
        @endif

    </div>
</section>
@endsection