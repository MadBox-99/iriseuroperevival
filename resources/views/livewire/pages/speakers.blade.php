<div>
    {{-- Hero Section --}}
    <section class="relative py-24 bg-stone-950">
        <div class="absolute inset-0 opacity-5" style="background-image: url('{{ asset('images/textures/noise.png') }}');"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4">
            <div class="text-center mb-4">
                <span class="inline-block px-4 py-1.5 text-xs font-semibold tracking-wider uppercase text-amber-400 bg-amber-500/10 border border-amber-500/30 rounded-full mb-4">
                    Europe Revival 2026
                </span>
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">Our Speakers</h1>
                <p class="text-xl text-white/60 max-w-2xl mx-auto">
                    Meet the anointed men and women of God who will be ministering at Europe Revival 2026.
                </p>
            </div>
        </div>
    </section>

    {{-- Featured Speakers --}}
    @if($featuredSpeakers->isNotEmpty())
        <section class="py-20 bg-stone-900">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Featured Speakers</h2>
                    <p class="text-white/50 max-w-xl mx-auto">
                        Powerful voices bringing messages of revival, healing, and transformation
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($featuredSpeakers as $speaker)
                        <a href="{{ route('speaker.show', $speaker->slug) }}"
                           class="group relative overflow-hidden rounded-2xl bg-stone-800/50 border border-stone-700 hover:border-amber-500/50 transition-all duration-300"
                           wire:key="featured-{{ $speaker->id }}">
                            {{-- Photo --}}
                            <div class="aspect-[3/4] overflow-hidden">
                                <img src="{{ $speaker->photo_path ? asset($speaker->photo_path) : asset('images/speakers/placeholder.webp') }}"
                                     alt="{{ $speaker->name }}"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-stone-900 via-stone-900/20 to-transparent"></div>
                            </div>

                            {{-- Content --}}
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                @if($speaker->title)
                                    <span class="inline-block px-3 py-1 text-xs font-semibold text-amber-400 bg-amber-500/20 border border-amber-500/30 rounded-full mb-3">
                                        {{ $speaker->title }}
                                    </span>
                                @endif
                                <h3 class="text-xl font-bold text-white mb-1">{{ $speaker->name }}</h3>
                                @if($speaker->organization)
                                    <p class="text-white/60 text-sm">{{ $speaker->organization }}</p>
                                @endif
                                @if($speaker->country)
                                    <p class="text-white/40 text-xs mt-1">{{ $speaker->country }}</p>
                                @endif
                            </div>

                            {{-- Hover Arrow --}}
                            <div class="absolute top-4 right-4 w-10 h-10 bg-amber-500 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-2 group-hover:translate-y-0">
                                <svg class="w-5 h-5 text-stone-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Workshop Leaders --}}
    @if($workshopLeaders->isNotEmpty())
        <section class="py-20 bg-stone-950">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Workshop Leaders</h2>
                    <p class="text-white/50 max-w-xl mx-auto">
                        Expert teachers leading interactive sessions on specialized topics
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($workshopLeaders as $speaker)
                        <a href="{{ route('speaker.show', $speaker->slug) }}"
                           class="group relative overflow-hidden rounded-2xl bg-stone-800/50 border border-stone-700 hover:border-cyan-500/50 transition-all duration-300"
                           wire:key="workshop-{{ $speaker->id }}">
                            {{-- Photo --}}
                            <div class="aspect-[3/4] overflow-hidden">
                                <img src="{{ $speaker->photo_path ? asset($speaker->photo_path) : asset('images/speakers/placeholder.webp') }}"
                                     alt="{{ $speaker->name }}"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-stone-900 via-stone-900/20 to-transparent"></div>
                            </div>

                            {{-- Content --}}
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                @if($speaker->title)
                                    <span class="inline-block px-3 py-1 text-xs font-semibold text-cyan-400 bg-cyan-500/20 border border-cyan-500/30 rounded-full mb-3">
                                        {{ $speaker->title }}
                                    </span>
                                @endif
                                <h3 class="text-lg font-bold text-white mb-1">{{ $speaker->name }}</h3>
                                @if($speaker->organization)
                                    <p class="text-white/60 text-sm">{{ $speaker->organization }}</p>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Worship Leaders --}}
    @if($worshipLeaders->isNotEmpty())
        <section class="py-20 bg-stone-900">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Worship Leaders</h2>
                    <p class="text-white/50 max-w-xl mx-auto">
                        Anointed worship leaders creating an atmosphere for encounter
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($worshipLeaders as $speaker)
                        <a href="{{ route('speaker.show', $speaker->slug) }}"
                           class="group relative overflow-hidden rounded-2xl bg-stone-800/50 border border-stone-700 hover:border-purple-500/50 transition-all duration-300"
                           wire:key="worship-{{ $speaker->id }}">
                            {{-- Photo --}}
                            <div class="aspect-[3/4] overflow-hidden">
                                <img src="{{ $speaker->photo_path ? asset($speaker->photo_path) : asset('images/speakers/placeholder.webp') }}"
                                     alt="{{ $speaker->name }}"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-stone-900 via-stone-900/20 to-transparent"></div>
                            </div>

                            {{-- Content --}}
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                @if($speaker->title)
                                    <span class="inline-block px-3 py-1 text-xs font-semibold text-purple-400 bg-purple-500/20 border border-purple-500/30 rounded-full mb-3">
                                        {{ $speaker->title }}
                                    </span>
                                @endif
                                <h3 class="text-lg font-bold text-white mb-1">{{ $speaker->name }}</h3>
                                @if($speaker->organization)
                                    <p class="text-white/60 text-sm">{{ $speaker->organization }}</p>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Empty State --}}
    @if($featuredSpeakers->isEmpty() && $workshopLeaders->isEmpty() && $worshipLeaders->isEmpty())
        <section class="py-32 bg-stone-900">
            <div class="max-w-2xl mx-auto px-4 text-center">
                <div class="w-20 h-20 bg-amber-500/20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-white mb-4">Speaker Announcements Coming Soon</h2>
                <p class="text-white/60 mb-8">
                    We're excited to announce our lineup of incredible speakers. Check back soon for updates!
                </p>
                <a href="{{ route('home') }}#speakers" class="btn-primary">
                    Back to Home
                </a>
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-20 bg-stone-950">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Don't Miss This Opportunity</h2>
            <p class="text-white/60 mb-8">
                Register now to secure your spot and experience these powerful ministers in person.
            </p>
            <a href="{{ route('register') }}" class="btn-primary">
                Register Now
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </section>
</div>
