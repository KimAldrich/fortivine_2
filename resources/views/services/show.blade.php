<!-- {{-- resources/views/services/show.blade.php --}}
@extends('layouts.app')
@section('title', $service->title . ' — Services')
@section('content')
    <x-section>
        <h1 class="text-3xl font-bold">{{ $service->title }}</h1>
        <article class="prose max-w-none mt-4">{!! nl2br(e($service->body)) !!}</article>
        @if($service->features)
            <h2 class="mt-6 font-semibold">Key Features</h2>
            <ul class="grid md:grid-cols-2 gap-2 mt-2 list-disc list-inside">
                @foreach($service->features as $f)<li>{{ $f }}</li>@endforeach
            </ul>
        @endif
    </x-section>
@endsection -->