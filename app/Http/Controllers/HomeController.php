<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)->get();
        return view('home', compact('products'));
    }

    public function product(string $slug)
    {
        $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $relatedProducts = Product::where('is_active', true)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();
        return view('product', compact('product', 'relatedProducts'));
    }
}
