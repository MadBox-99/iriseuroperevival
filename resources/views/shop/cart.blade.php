@extends('layouts.app')

@section('title', 'Shopping Cart - Europe Revival 2026')
@section('description', 'Review your shopping cart and proceed to checkout.')

@section('content')
<div class="min-h-screen bg-zinc-900 py-12">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <livewire:shop.shopping-cart />
    </div>
</div>
@endsection
