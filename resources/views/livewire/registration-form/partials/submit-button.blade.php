<button type="submit"
        wire:loading.attr="disabled"
        x-bind:disabled="! $wire.data?.accepts_terms"
        class="fi-btn fi-btn-size-md relative inline-flex items-center justify-center gap-1.5 px-4 py-2 font-semibold outline-none transition duration-75
               bg-amber-500 hover:bg-amber-400 text-stone-900 rounded-lg
               disabled:opacity-50 disabled:cursor-not-allowed">
    <span wire:loading.remove>
        @if($type === 'attendee')
            Proceed to Payment
        @else
            Submit Application
        @endif
    </span>
    <span wire:loading class="inline-flex items-center gap-2">
        <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Processing...
    </span>
</button>
