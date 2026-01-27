@extends('layouts.app')

@section('title', 'Checkout - Europe Revival 2026')
@section('description', 'Complete your purchase securely.')

@section('content')
<div class="min-h-screen bg-zinc-900 py-12">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <livewire:shop.checkout-form />
    </div>
</div>
@endsection
