<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function loginForm()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($request->email === 'admin@diblong.com' && $request->password === 'diblong2026') {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Geçersiz giriş bilgileri.']);
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $confirmedOrders = Order::where('status', 'confirmed')->count();
        $totalRevenue = Order::whereNotIn('status', ['cancelled'])->sum('total');
        $recentOrders = Order::latest()->limit(10)->get();
        $unreadMessages = DB::table('contact_messages')->where('is_read', false)->count();

        return view('admin.dashboard', compact(
            'totalOrders', 'pendingOrders', 'confirmedOrders', 'totalRevenue', 'recentOrders', 'unreadMessages'
        ));
    }

    // --- Orders ---

    public function orders(Request $request)
    {
        $query = Order::latest();

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                  ->orWhere('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $orders = $query->paginate(20);
        return view('admin.orders', compact('orders'));
    }

    public function orderDetail(Order $order)
    {
        $order->load('items');
        return view('admin.order-detail', compact('order'));
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,preparing,shipped,delivered,cancelled',
        ]);

        $order->update(['status' => $request->status]);

        return back()->with('success', 'Sipariş durumu güncellendi!');
    }

    // --- Products ---

    public function products()
    {
        $products = Product::latest()->get();
        return view('admin.products', compact('products'));
    }

    public function createProduct()
    {
        return view('admin.product-form', ['product' => null]);
    }

    public function storeProduct(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'category' => 'required|string|max:50',
            'stock' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'image_file' => 'required|image|max:5120',
            'image2_file' => 'nullable|image|max:5120',
        ]);

        $slug = Str::slug($data['name']);
        $existing = Product::where('slug', $slug)->count();
        if ($existing) {
            $slug .= '-' . ($existing + 1);
        }

        $imageName = $slug . '-1.' . $request->file('image_file')->extension();
        $request->file('image_file')->move(public_path('assets/products'), $imageName);

        $image2Name = null;
        if ($request->hasFile('image2_file')) {
            $image2Name = $slug . '-2.' . $request->file('image2_file')->extension();
            $request->file('image2_file')->move(public_path('assets/products'), $image2Name);
        }

        Product::create([
            'name' => $data['name'],
            'slug' => $slug,
            'short_description' => $data['short_description'],
            'description' => $data['description'],
            'price' => $data['price'],
            'old_price' => $data['old_price'] ?: null,
            'category' => $data['category'],
            'stock' => $data['stock'],
            'is_active' => $request->has('is_active'),
            'image' => $imageName,
            'image2' => $image2Name,
        ]);

        return redirect()->route('admin.products')->with('success', 'Ürün başarıyla eklendi!');
    }

    public function editProduct(Product $product)
    {
        return view('admin.product-form', compact('product'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'category' => 'required|string|max:50',
            'stock' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'image_file' => 'nullable|image|max:5120',
            'image2_file' => 'nullable|image|max:5120',
        ]);

        $updateData = [
            'name' => $data['name'],
            'short_description' => $data['short_description'],
            'description' => $data['description'],
            'price' => $data['price'],
            'old_price' => $data['old_price'] ?: null,
            'category' => $data['category'],
            'stock' => $data['stock'],
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('image_file')) {
            $imageName = $product->slug . '-1.' . $request->file('image_file')->extension();
            $request->file('image_file')->move(public_path('assets/products'), $imageName);
            $updateData['image'] = $imageName;
        }

        if ($request->hasFile('image2_file')) {
            $image2Name = $product->slug . '-2.' . $request->file('image2_file')->extension();
            $request->file('image2_file')->move(public_path('assets/products'), $image2Name);
            $updateData['image2'] = $image2Name;
        }

        $product->update($updateData);

        return redirect()->route('admin.products')->with('success', 'Ürün güncellendi!');
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Ürün silindi!');
    }

    // --- Messages ---

    public function messages()
    {
        $messages = DB::table('contact_messages')->latest()->paginate(20);
        return view('admin.messages', compact('messages'));
    }

    public function messageDetail($id)
    {
        $message = DB::table('contact_messages')->where('id', $id)->firstOrFail();
        DB::table('contact_messages')->where('id', $id)->update(['is_read' => true]);
        return view('admin.message-detail', compact('message'));
    }

    public function deleteMessage($id)
    {
        DB::table('contact_messages')->where('id', $id)->delete();
        return redirect()->route('admin.messages')->with('success', 'Mesaj silindi!');
    }
}
