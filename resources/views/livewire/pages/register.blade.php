<div>
<div class="min-h-screen bg-stone-950">
    {{-- Hero Header --}}
    <div class="relative pt-32 pb-16 overflow-hidden">
        {{-- Background --}}
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-linear-to-b from-amber-500/10 via-transparent to-stone-950"></div>
            <div class="absolute inset-0 opacity-20" style="background-image: url('{{ asset('images/textures/noise.png') }}');"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 text-center">
            {{-- Badge --}}
            <span class="inline-block px-4 py-1.5 text-xs font-semibold tracking-wider uppercase text-amber-400 bg-amber-500/10 border border-amber-500/30 rounded-full mb-6">
                October 23-25, 2026 • Budapest
            </span>

            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $title }}</h1>
            <p class="text-xl text-white/60">{{ $subtitle }}</p>
        </div>
    </div>

    {{-- Registration Form Container --}}
    <div class="relative z-10 px-4 pb-24">
        <div class="max-w-3xl mx-auto">
            {{-- Livewire Registration Form --}}
            <div class="bg-white border border-stone-200 rounded-3xl p-8 md:p-10 text-stone-900">
               <livewire:registration-form :type="$type" />
            </div>

            {{-- Help Section --}}
            <div class="mt-8 text-center">
                <p class="text-white/50 text-sm">
                    Need help? Contact us at
                    <a href="mailto:info@europerevival.org" class="text-amber-400 hover:underline">info@europerevival.org</a>
                </p>
            </div>
        </div>
    </div>
</div>
</div>
