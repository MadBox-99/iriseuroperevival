<x-layouts.auth.simple :title="__('Log in')">
    <div class="flex flex-col gap-6">
        {{-- Header --}}
        <div class="text-center">
            <h1 class="text-2xl font-bold text-white">{{ __('Log in to your account') }}</h1>
            <p class="mt-2 text-white/60">{{ __('Enter your email and password below to log in') }}</p>
        </div>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="p-4 text-sm text-green-400 bg-green-500/10 border border-green-500/20 rounded-lg">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-5">
            @csrf

            {{-- Email Address --}}
            <div>
                <label for="email" class="block text-sm font-medium text-white/70 mb-2">{{ __('Email address') }}</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="email@example.com"
                    class="form-input w-full"
                >
                @error('email')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="block text-sm font-medium text-white/70">{{ __('Password') }}</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-primary-400 hover:text-primary-300" wire:navigate>
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>
                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                    autocomplete="current-password"
                    placeholder="{{ __('Password') }}"
                    class="form-input w-full"
                >
                @error('password')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember Me --}}
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="remember" class="form-checkbox" {{ old('remember') ? 'checked' : '' }}>
                <span class="text-sm text-white/70">{{ __('Remember me') }}</span>
            </label>

            {{-- Submit Button --}}
            <button type="submit" class="btn-primary w-full justify-center">
                {{ __('Log in') }}
            </button>
        </form>

        @if (Route::has('register'))
            <p class="text-center text-sm text-white/60">
                {{ __('Don\'t have an account?') }}
                <a href="{{ route('register') }}" class="text-primary-400 hover:text-primary-300" wire:navigate>{{ __('Sign up') }}</a>
            </p>
        @endif
    </div>
</x-layouts.auth.simple>
