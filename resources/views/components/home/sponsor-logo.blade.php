@props([
    'sponsor',
    'size' => 'default', // 'main', 'default'
])

@php
    $heightClass = match($size) {
        'main' => 'h-20 md:h-28',
        default => 'h-12 md:h-16',
    };
    $invertClass = str_contains(strtolower($sponsor->name), 'mighty warrior') ? 'invert' : '';
@endphp

@if($sponsor->website_url)
    <a href="{{ $sponsor->website_url }}" target="_blank" rel="noopener noreferrer" class="inline-block">
        <img
            src="{{ $sponsor->logo_path ? Storage::get($sponsor->logo_path) : Vite::asset('images/sponsors/placeholder.svg') }}"
            alt="{{ $sponsor->name }}"
            class="{{ $heightClass }} {{ $invertClass }} {{ $size === 'main' ? 'opacity-80 hover:opacity-100 transition-opacity' : '' }}"
        >
    </a>
@else
    <img
        src="{{ $sponsor->logo_path ? Storage::get($sponsor->logo_path) : Vite::asset('images/sponsors/placeholder.svg') }}"
        alt="{{ $sponsor->name }}"
        class="{{ $heightClass }} {{ $invertClass }}"
    >
@endif
