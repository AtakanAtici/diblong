<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $cartItems = [];
        $total = 0;

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $subtotal = $product->price * $quantity;
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'subtotal' => $subtotal,
                ];
                $total += $subtotal;
            }
        }

        return view('cart', compact('cartItems', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'integer|min:1|max:10',
        ]);

        $cart = session()->get('cart', []);
        $productId = $request->product_id;
        $quantity = $request->quantity ?? 1;

        $cart[$productId] = ($cart[$productId] ?? 0) + $quantity;
        session()->put('cart', $cart);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'count' => array_sum($cart),
                'message' => 'Ürün sepete eklendi!',
            ]);
        }

        return back()->with('success', 'Ürün sepete eklendi!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:0|max:10',
        ]);

        $cart = session()->get('cart', []);

        if ($request->quantity == 0) {
            unset($cart[$request->product_id]);
        } else {
            $cart[$request->product_id] = $request->quantity;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Sepet güncellendi!');
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        unset($cart[$request->product_id]);
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Ürün sepetten kaldırıldı!');
    }

    public function count()
    {
        $cart = session()->get('cart', []);
        return response()->json(['count' => array_sum($cart)]);
    }
}
