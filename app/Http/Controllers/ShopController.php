<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(): View
    {
        return view('shop.index');
    }

    public function cart(): View
    {
        return view('shop.cart');
    }

    public function checkout(): View
    {
        return view('shop.checkout');
    }

    public function success(string $uuid): View
    {
        $order = Order::where('uuid', $uuid)->firstOrFail();

        return view('shop.success', compact('order'));
    }
}
