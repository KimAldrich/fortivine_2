{{-- resources/views/contact/index.blade.php --}}
@extends('layouts.app')
@section('title', 'Contact — FortiVine Tech')

@section('content')
    <section class="home-hero">
        {{-- Header --}}
        <header class="section-header">
            <h1 class="page-title">The Sustainable Growth Inquiry Form</h1>
            <p class="lead">Tell us a bit about your needs and we’ll get back within one business day.</p>
        </header>

    </section>
    <section class="section contact">
        <div class="container">


            {{-- Form --}}
            <div class="card contact-form">
                @include('contact._form') {{-- make sure fields use .form, .form-row, .input, .textarea, .btn (already in
                your CSS) --}}
            </div>

            {{-- Contact boxes --}}
            <div class="grid grid-3 contact-cards">
                <article class="card contact-card">
                    <div class="contact-card__icon" aria-hidden="true">✉️</div>
                    <h3 class="contact-card__title">Email</h3>
                    <p class="contact-card__body">
                        Sales & Partnership: <a class="link"
                            href="mailto:{{ config('forti.contact.emails.sales') }}">{{ config('forti.contact.emails.sales') }}</a><br>
                        Support: <a class="link"
                            href="mailto:{{ config('forti.contact.emails.support') }}">{{ config('forti.contact.emails.support') }}</a>
                    </p>
                </article>

                <article class="card contact-card">
                    <div class="contact-card__icon" aria-hidden="true">☎️</div>
                    <h3 class="contact-card__title">Phone</h3>
                    <p class="contact-card__body">
                        Main: <a class="link" href="tel:+1-555-123-4567">{{ config('forti.contact.phones.main') }}</a> (M–F
                        9–5 PST)<br>
                        24/7 Enterprise: <a class="link"
                            href="tel:+1-555-987-6543">{{ config('forti.contact.phones.enterprise') }}</a>
                    </p>
                </article>

                <article class="card contact-card">
                    <div class="contact-card__icon" aria-hidden="true">📍</div>
                    <h3 class="contact-card__title">Address</h3>
                    <p class="contact-card__body">{{ config('forti.contact.address') }}</p>
                </article>
            </div>

            {{-- Map --}}
            <div class="map-embed">
                <iframe title="FortiVine Tech Location" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps?q=Naldo%20Building%2C%20MacArthur%20Hwy%2C%20Urdaneta%20City%2C%20Pangasinan&output=embed">
                </iframe>
            </div>

        </div>
    </section>
@endsection