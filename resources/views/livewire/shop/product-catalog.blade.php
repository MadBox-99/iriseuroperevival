<div>
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex gap-2">
            <flux:button wire:click="$set('typeFilter', '')" :variant="$typeFilter === '' ? 'primary' : 'ghost'">
                All
            </flux:button>
            <flux:button wire:click="$set('typeFilter', 'merchandise')" :variant="$typeFilter === 'merchandise' ? 'primary' : 'ghost'">
                Merchandise
            </flux:button>
            <flux:button wire:click="$set('typeFilter', 'ticket')" :variant="$typeFilter === 'ticket' ? 'primary' : 'ghost'">
                Tickets
            </flux:button>
            <flux:button wire:click="$set('typeFilter', 'donation')" :variant="$typeFilter === 'donation' ? 'primary' : 'ghost'">
                Donations
            </flux:button>
        </div>

        <div class="flex items-center gap-4">
            <flux:input wire:model.live.debounce.300ms="search" placeholder="Search products..." class="w-64" />

            <a href="{{ route('shop.cart') }}" class="relative">
                <flux:button variant="ghost">
                    <flux:icon name="shopping-cart" class="h-5 w-5" />
                    @if($this->cartCount > 0)
                        <span class="absolute -right-1 -top-1 flex h-5 w-5 items-center justify-center rounded-full bg-red-500 text-xs text-white">
                            {{ $this->cartCount }}
                        </span>
                    @endif
                </flux:button>
            </a>
        </div>
    </div>

    @if(session('success'))
        <flux:callout variant="success" class="mb-4">
            {{ session('success') }}
        </flux:callout>
    @endif

    @if(session('error'))
        <flux:callout variant="danger" class="mb-4">
            {{ session('error') }}
        </flux:callout>
    @endif

    @if($this->products->isEmpty())
        <div class="py-12 text-center">
            <flux:heading size="lg">No products found</flux:heading>
            <flux:text class="mt-2">Try adjusting your search or filter criteria.</flux:text>
        </div>
    @else
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($this->products as $product)
                <div wire:key="product-{{ $product->id }}" class="group overflow-hidden rounded-lg border border-zinc-200 bg-white shadow-sm transition-shadow hover:shadow-md dark:border-zinc-700 dark:bg-zinc-800">
                    @if($product->image_path)
                        <div class="aspect-square overflow-hidden bg-zinc-100 dark:bg-zinc-700">
                            <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}" class="h-full w-full object-cover transition-transform group-hover:scale-105" />
                        </div>
                    @else
                        <div class="flex aspect-square items-center justify-center bg-zinc-100 dark:bg-zinc-700">
                            <flux:icon name="photo" class="h-16 w-16 text-zinc-400" />
                        </div>
                    @endif

                    <div class="p-4">
                        <div class="mb-2 flex items-start justify-between">
                            <flux:heading size="sm" class="line-clamp-2">{{ $product->name }}</flux:heading>
                            <flux:badge size="sm" :variant="match($product->type) {
                                'merchandise' => 'info',
                                'ticket' => 'success',
                                'donation' => 'warning',
                                default => 'default',
                            }">
                                {{ ucfirst($product->type) }}
                            </flux:badge>
                        </div>

                        @if($product->description)
                            <flux:text class="mb-3 line-clamp-2 text-sm">{{ $product->description }}</flux:text>
                        @endif

                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-zinc-900 dark:text-white">
                                {{ $product->formatted_price }}
                            </span>

                            <flux:button wire:click="addToCart({{ $product->id }})" wire:loading.attr="disabled" size="sm" variant="primary">
                                <span wire:loading.remove wire:target="addToCart({{ $product->id }})">Add to Cart</span>
                                <span wire:loading wire:target="addToCart({{ $product->id }})">Adding...</span>
                            </flux:button>
                        </div>

                        @if($product->stock_quantity !== null && $product->stock_quantity < 10)
                            <flux:text class="mt-2 text-xs text-orange-600">
                                Only {{ $product->stock_quantity }} left in stock
                            </flux:text>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
